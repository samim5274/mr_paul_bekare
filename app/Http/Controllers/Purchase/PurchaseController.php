<?php

namespace App\Http\Controllers\Purchase;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Company;
use App\Models\Purchaseorder;
use App\Models\Purchasecart;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Order;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\purchaseReturn;
use App\Models\PaymentMethod;
use Auth;

class PurchaseController extends Controller
{
    function generateChalanNum() {
        $userId = Auth::guard('admin')->user()->id;
        $date = now()->format('ymd');
        $serial = Purchaseorder::whereDate('created_at', now())->count() + 1;
        return $chalanNo = $date . str_pad($userId, 4, '0', STR_PAD_LEFT) . str_pad($serial, 8, '0', STR_PAD_LEFT);

    }

    public function purchaseView(){
        $chalanReg = $this->generateChalanNum();
        $cart = Purchasecart::where('chalan_reg', $chalanReg)->get();
        $count = Purchasecart::where('chalan_reg', $chalanReg)->count();
        $sum = Purchasecart::where('chalan_reg', $chalanReg)->sum('unit_price');
        return view('purchase.purchase', compact('cart','chalanReg','count','sum'));
    }

    public function purchaseCart(Request $request){
        $id = $request->input('search', '');
        $cart = new Purchasecart();
        $product = Product::where('name', 'like', '%'.$id.'%')->orWhere('id', 'like', '%'.$id.'%')->orWhere('sku', 'like', '%'.$id.'%')->first();

        if(!$product) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }
        $chalanReg = $this->generateChalanNum();
        $findFood = Purchasecart::where('chalan_reg', $chalanReg)->where('product_id', $product->id)->first();
        if($findFood) {
            return redirect()->back()->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
        }
        $cart->date = Carbon::now()->format('Y-m-d');
        $cart->time = Carbon::now()->format('H:i:s');
        $cart->user_id = Auth::guard('admin')->user()->id;
        $cart->chalan_reg = $chalanReg;
        $cart->product_id = $product->id;
        $cart->branch = Auth::guard('admin')->user()->branch_id;
        $cart->order_qty = 1;
        $cart->ready_qty = 0;
        $cart->delivery_qty = 0;
        $cart->status = 1; // ['1 = pending', '2 = processing', '3 = completed', '4 = delivery' , '0 = cancelled']
        $cart->remark = 'N/A';
        $cart->unit_price = $product->price;
        $cart->total_price = $product->price;
        $cart->unit = $product->size;
        $cart->save();
        return redirect()->back()->with('success','Product order cart added successfully.');
    }

    public function updateQty(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:purchasecarts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $newQty = $request->quantity;

        $cart = Purchasecart::find($request->id);

        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $cart->order_qty = $newQty;
        $cart->update();

        return response()->json([
            'status' => 'success',
            'quantity' => $cart->order_qty
        ]);
    }

    public function removeFromCart(Request $request, $id)
    {
        $quantity = $request->input('txtStock'); 
        $item = Purchasecart::find($id);

        if ($item) {
            $item->delete();
            return redirect()->back()->with('success', 'Item removed successfully.');
        }

        return redirect()->back()->with('error', 'Item not found.');
    }

    public function confirmPurchase(Request $request){
        $chalanReg = $request->input('txtReg', '');
        $order = new Purchaseorder();
        $order->date = Carbon::now()->format('Y-m-d');
        $order->time = Carbon::now()->format('H:i:s');
        $order->user_id = Auth::guard('admin')->user()->id;
        $order->branch = Auth::guard('admin')->user()->branch_id;
        $order->chalan_reg = $chalanReg;
        $order->total = Purchasecart::where('chalan_reg', $chalanReg)->sum('unit_price');
        $order->discount = 0;
        $order->vat = 0;
        $order->payable = Purchasecart::where('chalan_reg', $chalanReg)->sum('unit_price');
        $order->pay = 0;
        $order->due = Purchasecart::where('chalan_reg', $chalanReg)->sum('unit_price');
        $order->status = 1; // ['1 = pending', '2 = processing', '3 = completed', '4 = delivery' , '0 = cancelled']
        $order->save();
        return redirect()->back()->with('success', 'Your purchase order is confirm.');
    }

    public function purchaseList(){
        $chalanReg = $this->generateChalanNum();
        $date = Carbon::now()->format('Y-m-d');
        $branch = Auth::guard('admin')->user()->branch_id;
        $order = Purchaseorder::where('date', $date)->where('branch', $branch)->with('user','branchs')->paginate(20);
        return view('purchase.purchaseList', compact('order'));
    }

    public function printPurchaseList(){
        $chalanReg = $this->generateChalanNum();
        $date = Carbon::now()->format('Y-m-d');
        $branch = Auth::guard('admin')->user()->branch_id;
        $order = Purchaseorder::where('date', $date)->where('branch', $branch)->with('user','branchs')->get();
        $company = Company::all();
        return view('purchase.print.printPurchaseList', compact('order','company'));
    }

    public function editPurchaseOrder($reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->get();
        return view('purchase.editPurchaseOrder', compact('cart','reg'));
    }

    public function UpdatePurchaseQty(Request $request,$reg, $id){
        $purchaseOrder = Purchaseorder::where('chalan_reg', $reg)->where('status', '>', 1)->first();
        if($purchaseOrder){
            return redirect()->back()->with('error', 'Your purchase order already processing. Right now you can not change order qty. Thank you.');
        }
        $product = Purchasecart::where('chalan_reg', $reg)->where('product_id', $id)->first();
        $qty = $request->input('txtQty','');
        $product->order_qty = $qty;
        $product->total_price = $product->unit_price * $qty;
        $product->update();
        return redirect()->back()->with('success','Order qty update successfully.');
    }

    public function printSpecificPurchaseOrder($reg){
        $cart = Purchasecart::where('chalan_reg', $reg)->get();
        $company = Company::all();
        return view('purchase.print.printPurchaseOrder', compact('cart','reg','company'));
    }

}
