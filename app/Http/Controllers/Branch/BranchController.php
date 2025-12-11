<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use App\Models\Branch;
use App\Models\Admin;
use App\Models\Company;
use App\Models\Product;
use App\Models\Stock;
use App\Models\BranchTransfer;

class BranchController extends Controller
{
    public function branch(){
        $branch = Branch::with('manager')->paginate(20);
        $manager = Admin::all();
        // dd($branch);
        return view('branch.branch', compact('branch','manager'));
    }

    public function addBranch(Request $request){
        $name = $request->input('txtbranchName','');
        $location = $request->input('txtLocation','');
        $phone = $request->input('txtPhone','');
        $manager = $request->input('cbxManager','');

        if (collect([$name, $location, $phone, $manager])->contains(null)) {
            return redirect()->back()->with('warning', 'Some information is missing. Please full fill all information & try again. Thanks!');
        }

        if(Branch::where('manager_id',$manager)->first()){
            return redirect()->back()->with('warning', 'This user already assign one branch. Try to another user or branch to assign. Thanks!');
        }
        
        $branch = new Branch();
        $branch->name = $name;
        $branch->location = $location;
        $branch->phone = $phone;
        $branch->manager_id = $manager;
        $branch->save();
        return redirect()->back()->with('success', 'New '.$name.' branch created successfully.');
    }

    public function updateBranch(Request $request, $id) {
        $name = $request->input('txtbranchName','');
        $location = $request->input('txtLocation','');
        $phone = $request->input('txtPhone','');
        $manager = $request->input('cbxManager','');

        if (collect([$name, $location, $phone, $manager])->contains(null)) {
            return redirect()->back()->with('warning', 'Some information is missing. Please full fill all information & try again. Thanks!');
        }

        if(Branch::where('manager_id',$manager)->first()){
            return redirect()->back()->with('warning', 'This user already assign one branch. Try to another user or branch to assign. Thanks!');
        }
        
        $branch = Branch::where('id', $id)->first();
        if(empty($branch)){
            return redirect()->back()->with('error', 'Your branch not found. Please try to another. Thank You!');
        }
        $branch->name = $name;
        $branch->location = $location;
        $branch->phone = $phone;
        $branch->manager_id = $manager;
        $branch->update();
        return redirect()->back()->with('success', 'New '.$name.' branch created successfully.');
    }

    public function branchTransfer(){
        $branchs = Branch::all();
        $products = Product::where('availability', 1)->paginate(20);
        return view('branch.transfer-food', compact('products','branchs'));
    }

    public function serchBranchTransfer(Request $request){
        $output = "";

        $products = Product::where('name', 'like', '%'.$request->search.'%')
                            ->orWhere('id', 'like', '%'.$request->search.'%')
                            ->orWhere('sku', 'like', '%'.$request->search.'%')
                            ->get();

        $branchs = Branch::all();

        foreach ($products as $key => $val) {

            $editProduct = url('/edit-product/' . $val->id);
            $transferUrl = url('/branch-to-branch-transfer/' . $val->id);

            $name = strlen($val->name) > 22 ? substr($val->name, 0, 22) . '...' : $val->name;

            $branchOptions = '<option selected disabled>Choose Branch</option>';
            foreach ($branchs as $bnc) {
                $branchOptions .= '<option value="' . $bnc->id . '">' . $bnc->name . '</option>';
            }

            $output .= '
                <tr>
                    <td class="text-center">' . ($key + 1) . '</td>

                    <td>
                        <a href="'.$editProduct.'" class="fw-semibold text-decoration-none text-primary">
                            '.$name.'
                        </a>
                    </td>

                    <td class="text-center fw-semibold text-dark">
                        ৳' . number_format($val->price, 2) . '
                    </td>

                    <td class="text-center">
                        <span class="badge bg-success px-3 py-2">'.$val->stock.'</span>
                    </td>

                    <td>
                        <form action="'.$transferUrl.'" method="POST" class="row g-2 justify-content-center">
                            <input type="hidden" name="_token" value="'.csrf_token().'">

                            <div class="col-md-4">
                                <select name="branch_id" class="form-select form-select-sm" required>
                                    '.$branchOptions.'
                                </select>
                            </div>

                            <div class="col-md-3">
                                <input type="number"
                                    name="stock"
                                    value="0"
                                    min="1"
                                    max="'.$val->stock.'"
                                    required
                                    class="form-control form-control-sm text-center"
                                    placeholder="Qty">
                            </div>

                            <div class="col-md-3">
                                <input type="text"
                                    name="reason"
                                    value="Transfer"
                                    required
                                    class="form-control form-control-sm text-center"
                                    placeholder="Reason">
                            </div>

                            <div class="col-md-2 text-center">
                                <button type="submit"
                                        class="btn btn-md btn-primary w-100 d-flex align-items-center justify-content-center gap-2">
                                    <i class="fa-solid fa-truck"></i>
                                </button>
                            </div>
                        </form>
                    </td>
                </tr>
            ';
        }

        return response($output);
    }


    public function transferProduct(Request $request, $product_id){
        $request->validate([
            'branch_id' => 'required|integer|exists:branches,id',
            'stock'     => 'required|integer|min:1',
            'reason'    => 'nullable|string',
        ]);

        $date           = Carbon::today()->format('Y-m-d');
        $stockQty       = (int) $request->input('stock', 0);
        $reason         = $request->input('reason', '');
        $branch_id      = $request->input('branch_id', '');

        if($branch_id == Auth::guard('admin')->user()->branch_id){
            return redirect()->back()->with('warning', 'You select your branch. Please select another branch and try again!');
        }

        $product = Product::find($product_id); 
        if(empty($product)){
            return redirect()->back()->with('warning', 'Product not found. Please try another product. Thank You!');
        }

        if ($product->stock < $stockQty) {
            return redirect()->back()->with('warning', 'Not enough stock available. Current stock: ' . $product->stock);
        }

        $findProduct = BranchTransfer::where('date', $date)->where('branch_id', $branch_id)->where('product_id', $product_id)->first();

        if($findProduct){
            $findProduct->user_id = Auth::guard('admin')->user()->id;           
            $findProduct->product_id = $product->id;
            $findProduct->branch_id = $branch_id;
            $findProduct->quantity += $stockQty;
            $findProduct->price = $product->price * $findProduct->quantity;
            $findProduct->reason = $reason;
            $findProduct->date = $date;
            $findProduct->status = 2; // 1 stock in, 2 stock out
            
            $product->stock -= $stockQty;
            
            // Generate Receipt & Invoice
            do { $reg = rand(10000, 99999); }
            while (Stock::where('reg', $reg)->exists());
            
            $stock = new Stock();
            $stock->reg = $reg;
            $stock->date = $date;
            $stock->product_id = $product->id;
            $stock->stockOut = $stockQty;
            $stock->status = 4; // 1 sale, 2 return, 3 stock in and 4 stock out
            $stock->remark = 'Branch Transfer';
            
            $findProduct->save();
            $product->update();
            $stock->save();
            return redirect()->back()->with('success', $product->name .' branch transfer successfully.');
        } else {
            $data = new BranchTransfer();
            $data->user_id = Auth::guard('admin')->user()->id;           
            $data->product_id = $product->id;
            $data->branch_id = $branch_id;
            $data->quantity = $stockQty;
            $data->price = (float) $product->price * (int)$stockQty;
            $data->reason = $reason;
            $data->date = $date;
            $data->status = 2; // 1 stock in, 2 stock out
            
            $product->stock -= $stockQty;

            // Generate Receipt & Invoice
            do { $reg = rand(10000, 99999); }
            while (Stock::where('reg', $reg)->exists());
            
            $stock = new Stock();
            $stock->reg = $reg;
            $stock->date = $date;
            $stock->product_id = $product->id;
            $stock->stockOut = $stockQty;
            $stock->status = 4; // 1 sale, 2 return, 3 stock in and 4 stock out
            $stock->remark = 'Branch Transfer';
            
            $data->save();
            $product->update();
            $stock->save();
            return redirect()->back()->with('success', $product->name .' branch transfer successfully.');
        }
    }

    public function transferReport(){
        $date = Carbon::now()->format('Y-m-d');
        $stocks = BranchTransfer::where('date', $date)->paginate(20);
        $stotalStock = $stocks->sum('quantity');
        $stotalPrice = $stocks->sum('price');
        return view('branch.report.branch-transfer-report', compact('stocks','stotalStock','stotalPrice'));
    }

    public function filterTransterStock(Request $request){
        $start = $request->input('dtpStartDate', now()->format('Y-m-d'));
        $end   = $request->input('dtpEndDate', now()->format('Y-m-d'));

        $stocks = BranchTransfer::whereBetween('date', [$start, $end])->paginate(20);
        if($stocks->count() == 0){
            return redirect()->back()->with('error', 'Date wise product transfer report not found. Thank You!');
        }
        $stotalStock = $stocks->sum('quantity');
        $stotalPrice = $stocks->sum('price');

        $company = Company::all();

        if ($request->has('print')) {
            return view('branch.report.print.branch-transfer-report-print', compact('stocks','stotalStock','stotalPrice','company'));
        }

        return view('branch.report.branch-transfer-report', compact('stocks','stotalStock','stotalPrice'));
    }
}
