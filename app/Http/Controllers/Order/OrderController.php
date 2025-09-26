<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Company;
use App\Models\DueCollection;
use Auth;
use App\Notifications\SaleConfirmed;

class OrderController extends Controller
{
    function generateRegNum() {
        $order = Order::count() + 1;
        $userId = Auth::guard('admin')->user()->id;
        return Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($order, 4, '0', STR_PAD_LEFT);
    }

    public function confirmOrder(Request $request) {
        try{
            $order = new Order();
        
            $request->validate([
                'txtReg' => 'required',
                'txtSubTotal' => 'required',
            ]);

            $reg = $request->input('txtReg', '');
            
            $findReg = Order::where('reg', $reg)->first();
            if($findReg) {
                return redirect()->back()->with('error', 'This order already taken. Please add product to cart and try again. Thank You!');
            } 

            if($request->input('txtSubTotal', '') <= 0) {
                return redirect()->back()->with('error', 'Your cart is empty. Try again.');
            }        

            $received = $request->input('txtPay', 0);
            $total = $request->input('txtSubTotal', 0);
            $discount = $request->input('txtDiscount', 0);
            $vat = $request->input('txtVAT', 0);
            $payMethod = $request->input('paymentMethods', 0);

            $newVat = $total * $vat / 100;
            $payable = ($total - $discount) + $newVat;
            $dueAmount = $payable - $received;
                        
            if($received < 0) {
                return redirect()->back()->with('warning', 'You must be payment some amount. Unless you can not sale this product. Thanks');
            }

            $order->date = Carbon::now()->format('Y-m-d');
            $order->user_id = Auth::guard('admin')->user()->id;
            $order->branch_id = Auth::guard('admin')->user()->branch_id;
            $order->reg = $reg;
            $order->total = $total;
            $order->discount = $discount;
            $order->vat = $newVat;
            $order->payable = $payable;
            $order->paymentMethod = $payMethod;

            if($received >= $payable) {
                $order->pay = $payable;
                $order->due = 0;
            } else {
                $order->pay = $received;
                $order->due = $dueAmount;
                $request->validate([
                    'txtCustomerName' => 'required',
                    'txtCustomerPhone' => 'required',
                ]);
                $order->customerName = $request->input('txtCustomerName', '');
                $order->customerPhone = $request->input('txtCustomerPhone', '');
            }
            
            // Auto status set // 1 order confrim and 2 bill paid, 3 due
            if ($dueAmount > 0) {
                $order->status = 3; // Due
            } else {
                $order->status = 2; // Fully paid
            } 
            
            $order->save();
            
            // $order->user->notify(new SaleConfirmed($order));
            
            return redirect()->back()->with('success', 'Order sale successfully.')->with('reg', $reg);
            // return response()->json([ 'success' => true, 'reg' => $reg ]);
        } catch(Exception $e) {
            return redirect()->back()->with('error', 'Your cart is empty. Try again.'.$e);
        }
    }

    public function paymentOrder(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$start, $end])->whereNot('status', 1)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->sum('vat');
        return view('order.orderlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function dueCollectionOld(Request $request, $reg) {        
        $order = Order::where('reg', $reg)->first();

        if (!$order) {
            return back()->with('error', 'Order not found!');
        }

        $newPay = $request->input('txtPay', '');
        $newDiscount = $request->input('txtDiscount', '');

        $oldDue = $order->due;
        $oldPayable = $order->payable;

        if($newDiscount > $oldDue) {
            return redirect()->back()->with('warning', 'Discount more then due. It is not possible.');
        }
        
        $order->discount += $newDiscount;
        $newPayable = $oldPayable - $newDiscount;
        $order->payable = $newPayable;

        if ($newPay >= $newPayable || $newPay >= $oldDue) {
            $order->pay = $newPayable;
        } else {
            $order->pay += $newPay;
        }

        $newDue = $newPayable - $order->pay;
        $order->due = $newDue;

        $order->status = ($order->due <= 0) ? 2 : 3; // 1 order confrim and 2 bill paid, 3 due

        // dd($order);
        // $order->update();
        return redirect()->back()->with('success', 'Due collection successfully done. ORD-'.$reg);
    }

    public function dueCollectionView(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        // 1 order confrim and 2 bill paid, 3 due
        $order = Order::whereBetween('date', [$start, $end])->where('status', 3)->whereNot('status', 1)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('vat');
        return view('order.dueCollection', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function dueCollection(Request $request, $reg) {
        $date = Carbon::now()->format('Y-m-d');
        
        $order = Order::where('reg', $reg)->first();

        if (!$order) {
            return back()->with('error', 'Order not found!');
        }

        $newPay = $request->input('txtPay', '');
        $newDiscount = $request->input('txtDiscount', '');

        $oldDue = $order->due;
        $oldPay = $order->pay;
        $oldDiscount = $order->discount;
        $oldPayable = $order->payable;

        if($newDiscount > $oldDue) {
            return redirect()->back()->with('warning', 'Discount more then due. It is not possible.');
        }
        
        $totalDiscount = $oldDiscount + $newDiscount;
        $newPayable = $oldPayable - $newDiscount;   
        
        if ($newPay >= $oldDue) {
            $newPay = $oldDue;
        }

        $totalPay = $oldPay + $newPay;

        if ($totalPay > $newPayable) {
            $newPay = $newPayable - $oldPay;
            $totalPay = $newPayable;
        }

        // if ($newPay >= $newPayable || $newPay >= $oldDue) {
        //     $newPay2 = $newPayable;
        // } else {
        //     $newPay2 = $oldPay + $newPay;
        // }

        $newDue = $newPayable - $totalPay;
        
        $order->status = ($newDue <= 0) ? 2 : 3; // 1 order confrim and 2 bill paid, 3 due
        
        $findDueCollection = DueCollection::where('reg', $order->reg)->where('order_id', $order->id)->first();

        if($findDueCollection){
            $findDueCollection->order_id = $order->id;
            $findDueCollection->reg = $order->reg;
            $findDueCollection->payment_date = $date;
            $findDueCollection->pay += $newPay;
            $findDueCollection->due -= $newPay;
            $findDueCollection->user_id = Auth::guard('admin')->user()->id;
            
            $order->due -= $newPay;
            $order->update();
            $findDueCollection->update();
            return redirect()->back()->with('success', 'Due collection successfully done. ORD-'.$reg);
        } else {
            $dueCollection = new DueCollection();
            $dueCollection->order_id = $order->id;
            $dueCollection->reg = $order->reg;
            $dueCollection->payment_date = $date;
            $dueCollection->pay = $newPay;
            $dueCollection->due = $newDue;
            $dueCollection->user_id = Auth::guard('admin')->user()->id;
            
            $order->due -= $newPay;
            $order->update();
            $dueCollection->save();
            return redirect()->back()->with('success', 'Due collection successfully done. ORD-'.$reg);
        }
    }

    public function printAllOrder() {
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->get();
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->sum('vat');
        $company = Company::all();
        // dd($order);
        return view('order.print.printOrderlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','company'));
    }

    public function specificOrderPrint($reg){
        $order = Order::where('reg', $reg)->orderBy('id', 'desc')->firstOrFail();        
        $cart = Cart::where('reg', $reg)->get();
        $company = Company::all();
        // dd($cart);
        return view('order.print.printSpecificOrderlist', compact('order','cart','company'));
    }

    public function returnOrderList(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->sum('vat');
        return view('order.returnOrderlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function returnCart($reg){
        $cart = Cart::where('reg', $reg)->with('product','user')->get();
        $order = Order::where('reg', $reg)->get();
        $count = Cart::where('reg', $reg)->count();
        return view('order.cart', compact('cart','reg','count','order'));
    }

    public function returnConfirm($reg){
        $order = Order::where('reg', $reg)->first();
        if(!$order){
            return redirect()->back()->with('error', $reg.' - Order return not possile. Try again latter. Or contact with manager. Thanks!');
        }
        $order->status = 1; // status 1 means order returned
        $order->update();
        return redirect()->route('return.order.list.view')->with('success', $reg.' - Order return successfully complete.');
    }

    public function printReturnList(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $order = Order::whereBetween('date', [$start, $end])->where('status', 1)->orderBy('id', 'desc')->get();
        $total = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 1)->sum('vat');
        $company = Company::all();
        // dd($order);
        return view('order.print.printReturnlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','company'));
    }

    public function orderViewByReg($reg){
        $order = Order::where('reg', $reg)->orderBy('id', 'desc')->firstOrFail();        
        $cart = Cart::where('reg', $reg)->get();
        $company = Company::all();
        // dd($cart);
        return view('order.viewOrderByReg', compact('order','cart','company'));
    }
}
