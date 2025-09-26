<?php

namespace App\Http\Controllers\Branch;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use Auth;
use App\Models\Branch;
use App\Models\Admin;

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
}
