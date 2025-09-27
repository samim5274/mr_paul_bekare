<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\PurchaseReturn;
use App\Models\Order;
use App\Models\Stock;
use App\Models\PaymentMethod;
use App\Models\Company;
use Auth;

class SaleReturnController extends Controller
{
    function generateRegNum() {
        $order = Order::count() + 1;
        $userId = Auth::guard('admin')->user()->id;
        return Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($order, 4, '0', STR_PAD_LEFT);
    }

    public function purchaseReturn(){
        $company = Company::all();
        $reg = $this->generateRegNum();
        $payMathod = PaymentMethod::all();
        $count = PurchaseReturn::where('reg', $reg)->count();
        $cart = PurchaseReturn::where('reg', $reg)->get();
        return view('purchase.purchaseReturnList',compact('company','payMathod','cart','count','reg'));
    }

    public function addCartReturn(Request $request){
        $id = $request->input('search', '');
        $cart = new PurchaseReturn();
        $stock = new Stock();
        $product = Product::where('name', 'like', '%'.$id.'%')->orWhere('id', 'like', '%'.$id.'%')->orWhere('sku', 'like', '%'.$id.'%')->first();

        if(empty($product)) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }

        $reg = $this->generateRegNum();

        $findFood = PurchaseReturn::where('reg', $reg)->where('product_id', $product->id)->first();
        
        if($findFood) {
            return redirect()->back()->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
        }

        $cart->reg = $reg;
        $cart->date = Carbon::now()->format('Y-m-d');
        $cart->user_id = Auth::guard('admin')->user()->id;
        $cart->branch_id = Auth::guard('admin')->user()->branch_id;
        $cart->product_id = $product->id;
        $cart->price = $product->price;

        $stock->reg = $reg;
        $stock->date = Carbon::now()->format('Y-m-d');
        $stock->product_id = $product->id;
        $stock->stockIn += 1;
        $stock->status = 2; // 1 sale, 2 return, 3 stock in and 4 stock out
        $stock->remark = 'Return';

        $product->stock += 1;

        $product->update();
        $stock->save();
        $cart->save();
        return redirect()->back();
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $newQty = $request->quantity;

        $cart = PurchaseReturn::find($request->id);
        
        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $product = Product::find($cart->product_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $oldQty = $cart->quantity;
        $diff = $newQty - $oldQty;

        $stock = Stock::where('product_id', $cart->product_id)->where('reg', $cart->reg)->first();
        if (!$stock) {
            return response()->json(['status' => 'error', 'message' => 'Stock record not found for this registration']);
        }

        if($diff > 0) {
            $stock->stockIn += $diff;            
        } elseif ($diff < 0) {
            $adjust = abs($diff);
            if ($stock->stockIn < $adjust) {
                return response()->json(['status' => 'error', 'message' => 'Cannot reduce stock below 0']);
            }
            $stock->stockIn -= $adjust;
        }

        $stock->update();

        $product->stock += ($newQty - $cart->quantity);
        $product->save();

        $cart->quantity = $newQty;
        $cart->update();

        return response()->json([
            'status' => 'success',
            'quantity' => $cart->quantity,
            'stock' => $product->stock
        ]);
    }

    public function removeCart($id, $reg) {
        $cart = PurchaseReturn::where('reg', $reg)->where('product_id', $id)->first();
        
        if (!$cart) {
            return redirect()->back()->with('warning', 'This item is no longer available.');
        }
        $product = Product::where('id', $cart->product_id)->first();        
        $stock = Stock::where('product_id', $cart->product_id)
                    ->where('reg', $cart->reg)
                    ->first();
        
        if ($product) {
            $txtStock = $cart->quantity;
            $product->stock -= $txtStock;
            $product->update();
        }

        if ($stock) {
            $stock->delete();
        }

        $cart->delete();
        return redirect()->back();
    }

    public function saleReturnConfirm(Request $request){        
        $order = new Order();
    
        $request->validate([
            'txtReg' => 'required',
            'txtSubTotal' => 'required',
            'txtCustomerName' => 'required',
            'txtCustomerPhone' => 'required',
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
        $order->status = 3; // 1 bill paid, 2 due & 3 return
        $order->customerName = $request->input('txtCustomerName', '');
        $order->customerPhone = $request->input('txtCustomerPhone', '');

        if($received >= $payable) {
            $order->pay = $payable;
            $order->due = 0;
        } else {
            $order->pay = $received;
            $order->due = $dueAmount;            
        }
                
        $order->save();
        // dd($order);
        // $order->user->notify(new SaleConfirmed($order));
        
        return redirect()->back()->with('success', 'Order sale successfully.')->with('reg', $reg);      
    }
}
