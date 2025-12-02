<?php

namespace App\Http\Controllers\Sale;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Product;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Stock;
use App\Models\PaymentMethod;
use App\Models\Company;
use Auth;

class SaleController extends Controller
{
    function generateRegNum() {
        $order = Order::count() + 1;
        $userId = Auth::guard('admin')->user()->id;
        return Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($order, 4, '0', STR_PAD_LEFT);
    }

    public function saleView(){
        $data = Product::where('availability', 1)->paginate(20);
        return view('sale.sale_view', compact('data'));
    }

    public function liveSearch(Request $request){
        $output="";
        $product = Product::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('id', 'like', '%'.$request->search.'%')
                            ->orWhere('sku', 'like', '%'.$request->search.'%')->get();
        foreach($product as $val){
            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name;
            $price = $val->price;
            $ingredient = strlen($val->ingredients) > 40 ? substr($val->ingredients, 0, 40) . '...' : $val->ingredients;
            $discription = strlen($val->description) > 40 ? substr($val->description, 0, 40) . '...' : $val->description;
            $img = asset('/img/food/' . $val->image);
            $cart = url('/add-to-cart/'.$val->id);
            $output.= '
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-12 mb-4">
                <div class="card h-100 shadow-sm">
                    <a href="#"><img src="'.$img.'" class="card-img-top" alt="image not found" style="max-height: 250px;"></a>
                    <div class="card-body d-flex flex-column">
                        <h4 class="card-title"><a href="#">'.$name.' - ৳ '.$price.'/-</a></h4>
                        <p>'.$ingredient.'</p>
                        <p>'.$discription.'</p>
                        <a href="'.$cart.'" class="mt-auto btn btn-outline-success w-100">
                            <i class="mdi mdi-cart-plus fa-lg" aria-hidden="true" style="font-size: 1rem;"></i>
                            <span style="font-size: 1rem;" class="mb-0">Add Cart</span>
                        </a>
                    </div>
                </div>
            </div>
            ';
        }

        return response($output);
    }

    public function addCart($id) {
        $cart = new Cart();
        $stock = new Stock();
        $product = Product::where('id', $id)->first();

        if(empty($product) || $product->availability == 0) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }

        if($product->stock <= 0) {
            return redirect()->back()->with('warning','Sorry 😞 This item stock not availabel righ now. Try to another. Thank You!');
        }

        // if($product->expired < Carbon::today()){
        //     return redirect()->back()->with('warning','Sorry 😞 This item is expried. Try to another. Thank You!');
        // }

        $reg = $this->generateRegNum();
        $findFood = Cart::where('reg', $reg)->where('product_id', $product->id)->first();
        if($findFood) {
            return redirect()->route('sale.view')->with('warning', 'Item already added. Try to another item. If you add more quentity then go to cart.');
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
        $stock->stockOut += 1;
        $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out
        $stock->remark = 'Out';

        $product->stock -= 1;

        // dd($cart);
        $product->update();
        $stock->save();
        $cart->save();
        return redirect()->back();
        // return redirect()->back()->with('success', 'Item add to card successfully.');
    }

    public function addCart2(Request $request) {
        $id = $request->input('search', '');
        $cart = new Cart();
        $stock = new Stock();
        $product = Product::where('name', 'like', '%'.$id.'%')->orWhere('id', 'like', '%'.$id.'%')->orWhere('sku', 'like', '%'.$id.'%')->first();

        if(empty($product) || $product->availability == 0) {
            return redirect()->back()->with('error','This item not availabel righ now');
        }

        if($product->stock <= 0) {
            return redirect()->back()->with('warning','Sorry 😞 This item stock not availabel righ now. Try to another. Thank You!');
        }

        // if($product->expired < Carbon::today()){
        //     return redirect()->back()->with('warning','Sorry 😞 This item is expried. Try to another. Thank You!');
        // }

        $reg = $this->generateRegNum();

        $findFood = Cart::where('reg', $reg)->where('product_id', $product->id)->first();
        
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
        $stock->stockOut += 1;
        $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out
        $stock->remark = 'Out';

        $product->stock -= 1;

        // dd($cart);
        $product->update();
        $stock->save();
        $cart->save();
        return redirect()->back();
        // return redirect()->back()->with('success', 'Item add to card successfully.');
    }

    public function cartView(){
        $reg = $this->generateRegNum();
        $payMathod = PaymentMethod::all();
        $cart = Cart::where('reg', $reg)->get();
        $count = Cart::where('reg', $reg)->count();
        $company = Company::all();
        // dd($data);
        return view('cart.cart', compact('cart','count','reg','payMathod','company'));
    }

    public function updateQuantity(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:carts,id',
            'quantity' => 'required|integer|min:1'
        ]);

        $newQty = $request->quantity;

        $cart = Cart::find($request->id);
        
        if (!$cart) {
            return response()->json(['status' => 'error', 'message' => 'Cart item not found'], 404);
        }

        $product = Product::find($cart->product_id);

        if (!$product) {
            return response()->json(['status' => 'error', 'message' => 'Food item not found']);
        }

        $availableStock = $product->stock + $cart->quantity;

        if ($newQty > $availableStock) {
            return response()->json(['status' => 'error', 'message' => 'Food stock not available']);
        }

        $oldQty = $cart->quantity;
        $diff = $newQty - $oldQty;

        $stock = Stock::where('product_id', $cart->product_id)
                        ->where('reg', $cart->reg)
                        ->first();
        if (!$stock) {
            return response()->json(['status' => 'error', 'message' => 'Stock record not found for this registration']);
        }

        if($diff > 0) {
            $stock->stockOut += $diff;            
        } elseif ($diff < 0) {
            $adjust = abs($diff);
            if ($stock->stockOut < $adjust) {
                return response()->json(['status' => 'error', 'message' => 'Cannot reduce stock below 0']);
            }
            $stock->stockOut -= $adjust;
        }

        $stock->update();

        $product->stock -= ($newQty - $cart->quantity);
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
        $cart = Cart::where('reg', $reg)->where('product_id', $id)->first();
        
        if (!$cart) {
            return redirect()->back()->with('warning', 'This item is no longer available.');
        }
        $product = Product::where('id', $cart->product_id)->first();        
        $stock = Stock::where('product_id', $cart->product_id)
                    ->where('reg', $cart->reg)
                    ->first();
        
        if ($product) {
            $txtStock = $cart->quantity;
            $product->stock += $txtStock;
            $product->update();
        }

        if ($stock) {
            $stock->delete();
        }

        $cart->delete();
        return redirect()->back();
        // return redirect()->back()->with('success', 'The item has been successfully removed from the cart.');
    }
}
