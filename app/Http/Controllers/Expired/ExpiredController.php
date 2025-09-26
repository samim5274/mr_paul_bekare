<?php

namespace App\Http\Controllers\Expired;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Company;
use App\Models\ExpiredProduct;

class ExpiredController extends Controller
{
    public function productList(){
        $products = Product::paginate(20);
        return view('expired.expired-product-list', compact('products'));
    }

    public function expiredProductQty(Request $request, $product_id){
        $date = Carbon::today()->format('Y-m-d');

        $product = Product::where('id', $product_id)->first();
        if(empty($product)){
            return redirect()->back()->with('warning', 'Product not found. Please try another product. Thank You!');
        }

        $stockQty = $request->input('stock', '');

        $data = new ExpiredProduct();
        $data->product_id = $product->id;
        $data->name = $product->name;
        $data->price = $product->price;
        $data->quantity = $stockQty;
        $data->expired_at = $date;

        $product->stock -= $stockQty;

        $stock = new Stock();
        $stock->reg = 0;
        $stock->date = $date;
        $stock->product_id = $product->id;
        $stock->stockOut = $stockQty;
        $stock->status = 1; // 1 sale, 2 return, 3 stock in and 4 stock out
        $stock->remark = 'Waste';

        $data->save();
        $product->update();
        $stock->save();
        return redirect()->back()->with('success', 'Product waste successfully.');
    }

    public function liveSearch(Request $request){
        $output = "";
        $product = Product::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('id', 'like', '%'.$request->search.'%')
                            ->orWhere('sku', 'like', '%'.$request->search.'%')
                            ->get();

        foreach($product as $key => $val){

            $editProduct = url('/edit-product/'.$val->id);
            $updateStock = url('/update-stock/'.$val->id);
            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name;

            $output .= '
                <tr>
                    <td class="text-center">'.($key+1).'</td>
                    <td>
                        <a href="'.$editProduct.'" class="fw-semibold text-decoration-none text-primary">'.$name.'</a>
                    </td>
                    <td class="text-center">'.$val->stock.'</td>
                    <td class="text-center">
                        <form action="'.$updateStock.'" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="number" name="stock" value="'.$val->stock.'" min="0"
                                class="form-control form-control-sm text-center" style="max-width: 100px;">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </form>
                    </td>
                </tr>
            ';
        }

        return response($output);

    }
}
