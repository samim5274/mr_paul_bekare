<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use App\Models\Admin;
use App\Models\Category;
use Auth;

class SettingController extends Controller
{
    public function setting(){
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id', $id)->with('branch')->first();
        return view('setting.setting', compact('user'));
    }

    public function changePass(Request $request){
        $user = Auth::guard('admin')->user();

        $request->validate([
            'txtOldPassword' => 'required|min:6',
            'txtNewPassword' => 'required|min:8',
            'reNewPassword'  => 'required|same:txtNewPassword',
        ]);

        // Check old password
        if(!Hash::check($request->txtOldPassword, $user->password)){
            return back()->withErrors(['txtOldPassword' => 'Old password is incorrect']);
        }

        $user->password = Hash::make($request->txtNewPassword);
        $user->save();

        return redirect()->back()->with('success', 'Password updated successfully!');
    }

    public function createCategory(Request $request){
        $category = $request->input('txtCategory', '');

        $data = new Category();
        $data->name = $category;
        $data->save();
        return redirect()->back()->with('success', 'New product category created successfully!');
    }
}
