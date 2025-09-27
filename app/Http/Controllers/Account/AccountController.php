<?php

namespace App\Http\Controllers\Account;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use Auth;
use App\Models\Order;
use App\Models\Company;
use App\Models\Expenses;
use App\Models\DueCollection;

class AccountController extends Controller
{
    public function account(){
        $date = Carbon::now()->format('Y-m-d');

        $order = Order::where('date', $date)->orderBy('id', 'desc')->paginate(15);
        $total = Order::where('date', $date)->sum('total');
        $discount = Order::where('date', $date)->sum('discount');
        $payable = Order::where('date', $date)->sum('payable');
        $pay = Order::where('date', $date)->sum('pay');
        $due = Order::where('date', $date)->sum('due');
        $vat = Order::where('date', $date)->sum('vat');
        $dueCollecion = DueCollection::where('payment_date', $date)->sum('pay');
        $expenses = Expenses::where('date', $date)->sum('amount');

        return view('total-transection-account.total-transection-account', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','expenses','dueCollecion'));
    }

    public function printAccount(){
        $date = Carbon::now()->format('Y-m-d');

        $order = Order::where('date', $date)->orderBy('id', 'desc')->paginate(15);
        $total = Order::where('date', $date)->sum('total');
        $discount = Order::where('date', $date)->sum('discount');
        $payable = Order::where('date', $date)->sum('payable');
        $pay = Order::where('date', $date)->sum('pay');
        $due = Order::where('date', $date)->sum('due');
        $vat = Order::where('date', $date)->sum('vat');
        $dueCollecion = DueCollection::where('payment_date', $date)->sum('pay');
        $expenses = Expenses::where('date', $date)->sum('amount');
        $company = Company::all();
        
        return view('total-transection-account.print-total-transection-account', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','expenses','dueCollecion','company','date'));
    }
}
