<?php

namespace App\Http\Controllers\Factory;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Purchaseorder;
use App\Models\Purchasecart;
use App\Models\Product;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\FactoryStock;
use Auth;

class FactoryController extends Controller
{
    function generateChalanNum() {
        $userId = Auth::guard('admin')->user()->id;
        $date = now()->format('ymd');
        $serial = Purchaseorder::whereDate('created_at', now())->count() + 1;
        return $chalanNo = $date . str_pad($userId, 4, '0', STR_PAD_LEFT) . str_pad($serial, 8, '0', STR_PAD_LEFT);
    }

    public function factoryView(){
        $chalanReg = $this->generateChalanNum();
        $date = Carbon::now()->format('Y-m-d');
        $order = Purchaseorder::where('status', '!=', 4)->where('date', $date)->with('user','branchs')->paginate(20);
        return view('factory.factory', compact('order'));
    }

    public function orderViewById($reg){
        $orderCart = Purchasecart::where('chalan_reg', $reg)->get();
        //dd($orderCart);
        return view('factory.cartView', compact('orderCart'));
    }

    public function updateStatus(Request $request){
        $status = $request->input('cbxStatus','');
        $chalanNo = $request->input('txtChalanNo','');
        $order = Purchaseorder::where('chalan_reg', $chalanNo)->first();
        $order->status = $status;
        $order->update();
        return redirect()->back()->with('success', 'Order status update');
    }

    public function updateReadyDelivaryQty(Request $request){
        $chalanReg = $request->input('txtReg','');
        $ProductId = $request->input('txtProductId','');
        $ready = $request->input('ready_qty','');
        $delivery = $request->input('delivery_qty','');
        $mgfDate = $request->input('mgfDate', '');
        $expDate = $request->input('expDate', '');

        $order = Purchasecart::where('chalan_reg', $chalanReg)->where('product_id', $ProductId)->first();
        $order->ready_qty = $ready;
        $order->delivery_qty = $delivery;
        
        $product = Product::where('id', $ProductId)->first();
        $product->manufactured = $mgfDate;
        $product->expired = $expDate;

        $order->update();
        $product->update();
        return redirect()->back()->with('success', 'Updated successfully submited your ready & delivery qty.');
    }

    public function OrderListBranch(){
        $date = Carbon::now()->format('Y-m-d');
        $order = Purchaseorder::where('date', $date)->with('user','branchs')->paginate(20);
        $branch = Branch::with('manager')->get();
        return view('factory.branch', compact('order','branch'));
    }

    public function findBranchAndOrder(Request $request){
        $startDate = $request->input('dtpStart', '');
        $endDate = $request->input('dtpEnd', '');
        $branchId = $request->input('cbxBranch', '');

        if (empty($startDate) || empty($endDate) || empty($branchId)) {
            return redirect()->back()->with('warning', 'You must select date range and branch. Thank You!');
        }

         $branches = Branch::all();
        
        $findOrder = Purchaseorder::whereBetween('date', [$startDate, $endDate])
                                    ->where('branch', $branchId)
                                    ->with('user', 'branchs')
                                    ->paginate(20);
        // dd($findOrder);
        return view('factory.findOrderListByBranch', compact('findOrder','branches'));
    }

    public function productOrder(){
        $product = Product::orderByRaw('LOWER(name) ASC')->get()->keyBy('id');
        $stockSummary = Purchasecart::with('product')
                            ->select('product_id', 
                                DB::raw('SUM(order_qty) as order_qty'), 
                                DB::raw('SUM(ready_qty) as ready_qty'),
                                DB::raw('SUM(delivery_qty) as delivery_qty'))
                            ->whereDate('date', Carbon::today())
                            ->groupBy('product_id')->get();

        $totalOrder_qty = $stockSummary->sum('order_qty');
        $totalReady_qty = $stockSummary->sum('ready_qty');
        $totalDelivery_qty = $stockSummary->sum('delivery_qty');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');

        // dd($product,$stockSummary,$totalOrder_qty,$totalReady_qty,$totalDelivery_qty,$paginatedSummary);
        return view('factory.productOrder', compact('product','stockSummary','totalOrder_qty','totalReady_qty','totalDelivery_qty','paginatedSummary'));
    }

    public function printProductPurchaseOrder(){
        $product = Product::orderByRaw('LOWER(name) ASC')->get()->keyBy('id');
        $stockSummary = Purchasecart::with('product')
                            ->select('product_id', 
                                DB::raw('SUM(order_qty) as order_qty'), 
                                DB::raw('SUM(ready_qty) as ready_qty'),
                                DB::raw('SUM(delivery_qty) as delivery_qty'))
                            ->whereDate('date', Carbon::today())
                            ->groupBy('product_id')->get();

        $totalOrder_qty = $stockSummary->sum('order_qty');
        $totalReady_qty = $stockSummary->sum('ready_qty');
        $totalDelivery_qty = $stockSummary->sum('delivery_qty');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $company = Company::all();
        // dd($product,$stockSummary,$totalOrder_qty,$totalReady_qty,$totalDelivery_qty,$paginatedSummary);
        return view('factory.print.printProductOrder', compact('product','stockSummary','totalOrder_qty','totalReady_qty','totalDelivery_qty','paginatedSummary','company'));
    }

    public function findOrderStock(Request $request){
        $product = Product::orderByRaw('LOWER(name) ASC')->get()->keyBy('id');
        $item = $request->input('cbxProduct', '');        
        if(!$item){
            return redirect()->back()->with('warning', 'You need must be select Product.');
        }
        $stock = Purchasecart::where('product_id', $item)->paginate(20);
        $stockOrder = Purchasecart::where('product_id', $item)->sum('order_qty');
        $stockReady = Purchasecart::where('product_id', $item)->sum('ready_qty');
        $stockDelivery = Purchasecart::where('product_id', $item)->sum('delivery_qty');
        // dd($stock,$stockOrder,$stockReady,$stockDelivery);        
        return view('factory.productOrder', compact('product','stockOrder','stockReady','stockDelivery','stock'));
    }

    public function findOrderStockId($id){
        $product = Product::orderByRaw('LOWER(name) ASC')->get()->keyBy('id');
        $item = $id;
        if(!$item){
            return redirect()->back()->with('warning', 'You need must be select Product.');
        }
        $stock = Purchasecart::where('product_id', $item)->paginate(20);
        $stockOrder = Purchasecart::where('product_id', $item)->sum('order_qty');
        $stockReady = Purchasecart::where('product_id', $item)->sum('ready_qty');
        $stockDelivery = Purchasecart::where('product_id', $item)->sum('delivery_qty');
        return view('factory.productOrder', compact('product','stockOrder','stockReady','stockDelivery','stock'));
    }

    public function receivedOrder(){
        $order = Purchaseorder::where('status', 2)->where('date', Carbon::today())->with('user','branchs')->paginate(20);
        return view('factory.receivedOrder', compact('order'));
    }

    public function FindReceivedOrder(Request $request){
        $start = $request->input('dtpStart','');
        $end = $request->input('dtpEnd','');
        $order = Purchaseorder::where('status', 2)->whereBetween('date', [$start, $end])->with('user','branchs')->paginate(20);
        return view('factory.receivedOrder', compact('order'));
    }

    public function deliveryOrder(){
        $order = Purchaseorder::where('date', Carbon::today())->where('status', 4)->with('user','branchs')->paginate(20);
        return view('factory.delivaryOrder', compact('order'));
    }

    public function searchDeliveryOrder(Request $request){
        $start = $request->input('dtpStart','');
        $end = $request->input('dtpEnd','');
        $order = Purchaseorder::whereBetween('date', [$start, $end])->where('status', 4)->with('user','branchs')->paginate(20);
        return view('factory.delivaryOrder', compact('order'));
    }

    public function deliveryCart($reg){        
        $deliveryCart = Purchasecart::where('chalan_reg', $reg)->get();
        return view('factory.deliveryCart', compact('deliveryCart'));
    }

    public function stockReceived($p_id, $reg){
        $product = Product::where('id', $p_id)->first();
        $purchasecart = Purchasecart::where('chalan_reg', $reg)->where('product_id', $p_id)->first();

        $product->stock += $purchasecart->delivery_qty;
        $purchasecart->status = 2;

        $stock = new Stock();
        $stock->reg = $reg;
        $stock->date = Carbon::today();
        $stock->product_id = $p_id;
        $stock->stockIn = $purchasecart->delivery_qty;
        $stock->stockOut = 0;
        $stock->remark = 'In from Factory.';
        $stock->status = 2;
        $product->update();
        $purchasecart->update();
        $stock->save();
        // dd($product, $purchasecart,$stock);
        return redirect()->back()->with('success','Stock received successfully.');
    }

    public function factoryReturn(){
        $products = Product::paginate(20);
        return view('factory.factory-product-return', compact('products'));
    }

    public function serchFactoryReturn(Request $request){
        $output = "";
        $product = Product::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('id', 'like', '%'.$request->search.'%')
                            ->orWhere('sku', 'like', '%'.$request->search.'%')
                            ->get();

        foreach($product as $key => $val){

            $editProduct = url('/edit-product/'.$val->id);
            $updateStock = url('/factory-return-qty/'.$val->id);
            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22).'...' : $val->name;

            $output .= '
                <tr>
                    <td class="text-center">'.($key+1).'</td>
                    <td>
                        <a href="'.$editProduct.'" class="fw-semibold text-decoration-none text-primary">'.$name.'</a>
                    </td>
                    <td class="text-center">'.$val->price.'</td>
                    <td class="text-center">'.$val->stock.'</td>
                    <td class="text-center">
                        <form action="'.$updateStock.'" method="POST" class="d-flex justify-content-center align-items-center gap-2">
                            <input type="hidden" name="_token" value="'.csrf_token().'">
                            <input type="number" name="stock" value="'.$val->stock.'" min="0"
                                class="form-control form-control-sm text-center" style="max-width: 100px;">
                            <input type="text" name="reason" value="N/A" required class="form-control form-control-sm text-center" style="max-width: 100px;">
                            <button type="submit" class="btn btn-sm btn-success">Save</button>
                        </form>
                    </td>
                </tr>
            ';
        }

        return response($output);
    }

    public function factoryReturnQty(Request $request, $productId){
        $date = Carbon::today()->format('Y-m-d');
        $stockQty = $request->input('stock', '');
        $reason = $request->input('reason', '');

        $product = Product::where('id', $productId)->first(); 
        if(empty($product)){
            return redirect()->back()->with('warning', 'Product not found. Please try another product. Thank You!');
        }

        if ($product->stock < $stockQty) {
            return redirect()->back()->with('warning', 'Not enough stock available. Current stock: ' . $product->stock);
        }

        $findProduct = FactoryStock::where('return_date', $date)->where('product_id', $productId)->first();
        if($findProduct){
            $findProduct->user_id = Auth::guard('admin')->user()->id;           
            $findProduct->product_id = $product->id;
            $findProduct->quantity += $stockQty;
            $findProduct->price = (float) $product->price * (int)$findProduct->quantity;
            $findProduct->reason = $reason;
            $findProduct->return_date = $date;
            $findProduct->status = 1; // 1 stock in, 2 stock out
            
            $product->stock -= $stockQty;
            
            $stock = new Stock();
            $stock->reg = 0;
            $stock->date = $date;
            $stock->product_id = $product->id;
            $stock->stockOut = $stockQty;
            $stock->status = 4; // 1 sale, 2 return, 3 stock in and 4 stock out
            $stock->remark = 'factory Return';
            
            $findProduct->save();
            $product->update();
            $stock->save();
            return redirect()->back()->with('success', $product->name .' factory returned successfully.');
        } else {
            $data = new FactoryStock();
            $data->user_id = Auth::guard('admin')->user()->id;           
            $data->product_id = $product->id;
            $data->quantity = $stockQty;
            $data->price = (float) $product->price * (int)$stockQty;
            $data->reason = $reason;
            $data->return_date = $date;
            $data->status = 1; // 1 stock in, 2 stock out
            
            $product->stock -= $stockQty;
            
            $stock = new Stock();
            $stock->reg = 0;
            $stock->date = $date;
            $stock->product_id = $product->id;
            $stock->stockOut = $stockQty;
            $stock->status = 4; // 1 sale, 2 return, 3 stock in and 4 stock out
            $stock->remark = 'factory Return';
            
            $data->save();
            $product->update();
            $stock->save();
            return redirect()->back()->with('success', $product->name .' factory returned successfully.');
        }
    }
}
