<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use Auth;
use Session;
use App\Models\Admin;
use App\Models\Branch;
use App\Mail\OtpMail; 
use Mail;

class AdminController extends Controller
{
    public function login(){
        Auth::guard('admin')->logout();
        session()->invalidate();
        session()->regenerateToken();
        return view('auth.login');
    }

    public function userLogin(Request $request)
    {
        $request->validate([
            'txtEmail' => 'required|email',
            'txtPassword' => 'required',
        ]);

        $credentials = [
            'email' => $request->txtEmail,
            'password' => $request->txtPassword,
            'status' => 1,
        ];

        $remember = $request->has('remember');

        if (Auth::guard('admin')->attempt($credentials, $remember)) {
            $userId = Auth::guard('admin')->id();
            $username = Auth::guard('admin')->user()->name;
            $branch = Auth::guard('admin')->user()->branch;
            return redirect('/')->with('success', 'Welcome back, ' . $username);
        }

        return redirect()->back()->with('error', 'Invalid email or password. Please try again!');
    }

    public function profile(){
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id', $id)->with('branch')->first();
        return view('profile.profile', compact('user'));
    }

    public function editProfile(){
        $id = Auth::guard('admin')->user()->id;
        $user = Admin::where('id', $id)->with('branch')->first();
        return view('profile.edit-profile', compact('user'));
    }

    public function updateProfile(Request $request, $id){
        $user = Admin::where('id', $id)->with('branch')->first();
        if(empty($user)){
            return redirect()->back()->with('error', 'User not found. Please try again!');
        }

        $request->validate([
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user->name = $request->input('name');
        $user->phone = $request->input('phone');
        $user->dob = $request->input('dob');
        $password = Hash::make($request->input('password'));
        
        if (!Hash::check($request->input('password'), $user->password)) {
            return redirect()->back()->with('error', 'Password not match. Please try again.');
        }
        
        if ($request->hasFile('fileImage')) {

            if ($user->photo) {
                $path = public_path('img/employee/' . $user->photo);
                logger("Trying to delete: " . $path);
                if (file_exists($path)) {
                    unlink($path);
                } else {
                    logger("File not found: " . $path);
                }
            }

            if ($request->hasFile('fileImage')) {
                $file = $request->file('fileImage');

                if ($file->isValid()) {
                    $ext = $file->getClientOriginalExtension();
                    $fileName = 'user-' . time() . '.' . $ext;

                    $location = public_path('img/employee/');

                    if (!file_exists($location)) {
                        mkdir($location, 0755, true);
                    }

                    $file->move($location, $fileName);
                    $user->photo = $fileName;
                }
            }else {
                $user->photo = $user->photo ?? 'default.jpg';
            }
            $user->update();
            return redirect()->route('profile.edit.view')->with('success', 'Product updated successfully.');
        }
    }

    public function createAccount(){
        return view('auth.register');
    }

    public function CreateAccountNew(Request $request){
        $data = new Admin();
        $first = $request->input('txtFirstName','');
        $last = $request->input('txtLastName','');
        $email = $request->input('txtEmail','');
        $password = $request->input('txtPassword','');
        
        if(empty($first) || empty($last) || empty($email) || empty($password)){
            return redirect()->back()->with('error','Some information is missing. Please fill all information and try again.');
        }

        $data->name = $first .' '. $last;
        $data->email = $email;
        $data->password = Hash::make($password);
        $data->save();
        return redirect()->back()->with('success','Your account is created successfully. Now contact with Admin for active your account. Thank You!');
    }

    public function permission(){
        $user = Admin::with('branch')->paginate(20);
        $branches = Branch::all(); 
        return view('account.permission', compact('user','branches'));
    }

    public function updateStatus($id){
        $findUser = Admin::where('id', $id)->with('branch')->first();
        $findUser->status = $findUser->status == 0 ? 1 : 0;
        $findUser->update();
        return redirect()->back()->with('success', 'Status updated successfully.');
    }

    public function profilePermissionView($id){
        $user = Admin::with('branchs')->where('id', $id)->first();
        $branches = Branch::all(); 
        return view('profile.permission-profile', compact('user','branches'));
    }

    public function updatePermission(Request $request){
        $user = Admin::where('id', $request->input('txtStdIt',''))->first();
        $user->branch_id = $request->input('branch_id', '');
        $user->role = $request->input('role_id', '');
        $user->update();
        return redirect()->back()->with('success', 'Permission updated successfully.');
    }

    public function findAccount(){
        return view('auth.find-account');
    }

    public function findAccountEmail(Request $request){
        $request->validate([
            'txtEmail' => 'required|email',
        ]);

        $email = $request->txtEmail;

        $admin = Admin::where('email', $email)->first();
        if(empty($admin)){
            return redirect()->back()->with('error', '❌ User not found. Please try again!');
        }

        // Generate 6 digit OTP
        $otp = rand(100000, 999999);
        $admin->otp = $otp;
        $admin->otp_expires_at = Carbon::now()->addMinutes(10);
        $admin->save();

        // Send OTP Mail
        Mail::to($email)->send(new OtpMail($otp));

        session(['reset_email' => $email]);

        return redirect()->route('otp.form')->with('success', 'OTP sent to your email!');
    }

    public function otpForm(){
        return view('auth.otp');
    }

    public function verifyOtp(Request $request)    {
        $request->validate([
            'otp' => 'required|digits:6',
        ]);

        $email = session('reset_email');

        $admin = Admin::where('email', $email)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Invalid request!');
        }

        if ($admin->otp != $request->otp) {
            return redirect()->back()->with('error', '❌ Invalid OTP!');
        }

        if (now()->gt($admin->otp_expires_at)) {
            return redirect()->back()->with('error', '⏰ OTP Expired!');
        }

        return redirect()->route('new.password.form');
    }

    public function newPassword(){
        return view('auth.new-password');
    }

    public function updateNewPassword(Request $request)
    {
        $request->validate([
            'password' => 'required|min:6|confirmed',
        ]);

        $email = session('reset_email');

        $admin = Admin::where('email', $email)->first();

        if (!$admin) {
            return redirect()->back()->with('error', 'Something went wrong!');
        }

        $admin->password = Hash::make($request->password);
        $admin->otp = null;
        $admin->otp_expires_at = null;
        $admin->save();

        session()->forget('reset_email');

        return redirect('/login')->with('success', 'Password reset successful!');
    }

}
