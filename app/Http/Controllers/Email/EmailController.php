<?php

namespace App\Http\Controllers\Email;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

use App\Mail\MyTestEmail; 
use Mail;
use Auth;
use App\Models\Order;

class EmailController extends Controller
{
    public function sendEmail(){
        $userName = Auth::guard('admin')->user()->name;
        $date = Carbon::now()->format('Y-m-d');
        $total = Order::whereDate('date', $date)->get();

        $data = [
            'name' => $userName,
        ];

        $mailAddress = [
            'banglarcele1122@gmail.com',
            'biswajitkp16@gmail.com',
            'shahriarahmedshawon60@gmail.com'
        ];

        // dd($data);
        Mail::to($mailAddress)->send(new MyTestEmail($data, $total));

        return redirect()->back()->with('success', 'Email send successfully');
    }
}
