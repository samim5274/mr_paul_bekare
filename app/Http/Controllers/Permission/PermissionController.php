<?php

namespace App\Http\Controllers\Permission;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Models\Admin;
use Auth;

class PermissionController extends Controller
{
    public function permission(){
        $user = Admin::paginate(10);
        return view('permission.permission', compact('user'));
    }

    public function permissionUpdate(Request $request){
        $request->validate([
            'txtId' => 'required',
            'cbxRole' => 'required',
            'cbxStatus' => 'required',
        ]);

        $userId = $request->input('txtId', '');
        $role = $request->input('cbxRole', '');
        $status = $request->input('cbxStatus', '');

        $data = Admin::findOrFail($userId);
        $data->role = $role;
        $data->status = $status;
        $data->update();
        return redirect()->back()->with('success', 'User permission modified. Thank You!');
    }
}
