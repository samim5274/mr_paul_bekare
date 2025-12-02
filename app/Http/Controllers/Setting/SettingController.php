<?php

namespace App\Http\Controllers\Setting;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

use App\Models\Admin;
use App\Models\Category;
use App\Models\Subcategory;
use Auth;

class SettingController extends Controller
{
    public function setting(){
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id', $id)->with('branch')->first();
        $categories = Category::all();
        $subcategories = Subcategory::with('category')->get();
        return view('setting.setting', compact('user','categories','subcategories'));
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

    public function createSubCategory(Request $request){
        $category = $request->input('cbxCategory', '');
        $subcategory = $request->input('txtSubCategory', '');

        $data = new Subcategory();
        $data->category_id = $category;
        $data->name = $subcategory;
        $data->save();
        return redirect()->back()->with('success', 'New product sub-category created successfully!');
    }

    public function updateCategory(Request $request, $id){
        $request->validate([
            'txtCategory' => 'required|string|max:255|unique:categories,name,' . $id,
        ], [
            'txtCategory.required' => 'Category name is required.',
            'txtCategory.max' => 'Category name cannot exceed 255 characters.',
            'txtCategory.unique' => 'This category name already exists.',
        ]);

        $name = $request->input('txtCategory', '');

        $category = Category::find($id);
        if (!$category) {
            return redirect()->back()->with('warning', 'Category not found. Please try again.');
        }
        $category->name = $name;
        $category->update();
        return redirect()->back()->with('success', 'Category update successfully!');
    }

    public function updateSubCategory(Request $request, $id){
        $request->validate([
            'cbxCategory' => 'required|exists:categories,id',
            'txtSubCategory' => 'required|string|max:255|unique:subcategories,name,' . $id,
        ], [
            'cbxCategory.required' => 'Please select a category.',
            'cbxCategory.exists' => 'Selected category does not exist.',
            'txtSubCategory.required' => 'Sub-category name is required.',
            'txtSubCategory.max' => 'Sub-category name cannot exceed 255 characters.',
            'txtSubCategory.unique' => 'This sub-category name already exists.',
        ]);
        
        $category = $request->input('cbxCategory', '');
        $subcategory = $request->input('txtSubCategory', '');
        
        $data = Subcategory::find($id);
        if (!$data) {
            return redirect()->back()->with('warning', 'Sub-Category not found. Please try again.');
        }
        $data->category_id = $category;
        $data->name = $subcategory;
        $data->save();
        return redirect()->back()->with('success', 'Sub-Category update successfully!');
    }
}
