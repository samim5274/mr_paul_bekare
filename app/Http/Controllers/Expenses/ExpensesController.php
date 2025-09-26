<?php

namespace App\Http\Controllers\Expenses;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Excategory;
use App\Models\Exsubcategory;
use App\Models\Expenses;
use App\Models\Company;
use Auth;

class ExpensesController extends Controller
{
    public function expensesView(){
        $date = Carbon::now()->format('Ymd');
        $category = Excategory::all();
        $expenses = Expenses::where('date', $date)->paginate(40);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.expenses', compact('category','expenses','total'));
    }

    public function getSubcategory(Request $request, $id)
    {
        $subCategory = Exsubcategory::where('cat_id', $id)->get();
        return response()->json(['subCategory'=>$subCategory]);
    }

    public function expenses(Request $request){
        if(empty($request->input('cbxCategory', '')) || empty($request->input('cbxsubcategory', ''))){
            return redirect()->back()->with('success', 'Some information is missing. Please full fill all information & try again. Thank You!');
        }
        $userId = optional(Auth::guard('admin')->user())->id;
        if (!$userId) {
            return back()->withErrors(['error' => 'No admin user is logged in.']);
        }
        $data = new Expenses();
        $data->catId = $request->input('cbxCategory', '');
        $data->subcatId = $request->input('cbxsubcategory', '');
        $data->userId = $userId;
        $data->date = Carbon::now()->format('Ymd');
        $data->amount = $request->input('txtAmount', '');
        $data->save();
        return redirect()->back()->with('success', 'Daily expenses added successfully.');
    }

    Public function editExpenses($id){
        $expenses = Expenses::where('id', $id)->first();
        $category = Excategory::all();
        $subcategory = Exsubcategory::all();
        return view('expenses.edit-expenses', compact('expenses','category','subcategory'));
    }

    public function updateExpenses(Request $request, $id){
        if(empty($request->input('cbxCategory', '')) || empty($request->input('cbxsubcategory', ''))){
            return redirect()->back()->with('success', 'Some information is missing. Please full fill all information & try again. Thank You!');
        }
        $data = Expenses::where('id', $id)->first();
        $data->catId = $request->input('cbxCategory', '');
        $data->subcatId = $request->input('cbxsubcategory', '');
        $data->amount = $request->input('txtAmount', '');
        $data->remark = $request->input('txtRemark', '');
        $data->update();
        return redirect()->route('expenses.view')->with('success', 'Daily expenses edit successfully.');
    }

    public function expensesSpecificPrint($id){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('id', $id)->get();
        $company = Company::all();
        return view('report.expenses.specific-expenses-print', compact('expenses','company'));
    }

    public function expensesListPrint(){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->paginate(40);
        $total = Expenses::where('date', $date)->sum('amount');
        $company = Company::all();
        return view('report.expenses.print-expenses-list', compact('expenses','total','company'));
    }

    public function settingView(){
        $category = Excategory::paginate(20);
        $subCategory = Exsubcategory::paginate(20);
        return view('expenses.setting-expenses', compact('category','subCategory'));
    }

    public function editExCategory(Request $request, $category){
        $data = Excategory::where('id', $category)->first();
        if(empty($data)){
            return redirect()->back()->with('error', 'Expenses category can not be finded. Please try again. Thank you!');
        }
        $catName = $request->input('txtCategory', '');
        if(empty($catName)){
            return redirect()->back()->with('error', 'You must be insert your expenses category name. Thank you!');
        }
        $data->name = $catName;
        // $data->update();
        return redirect()->back()->with('success', 'Expenses category name chnaged successfully. Thank you!');
    }

    public function expensesDetails(){
        $date = Carbon::now()->format('Ymd');
        $expenses = Expenses::where('date', $date)->paginate(40);
        $total = Expenses::where('date', $date)->sum('amount');
        return view('expenses.report.expenses-report', compact('expenses','total'));
    }

    public function findExpenses(Request $request){
        $start = $request->input('dtpStartDate', '');
        $end = $request->input('dtpEndDate', '');
        $expenses = Expenses::where('date', [$start, $end])->paginate(40);
        $total = Expenses::whereBetween('date', [$start, $end])->sum('amount');
        $company = Company::all();
        if ($request->has('print')) {
            return view('expenses.report.expenses-report-print', compact('expenses','total','company','start','end'));
        }
        return view('expenses.report.expenses-report', compact('expenses','total'));
    }
}
