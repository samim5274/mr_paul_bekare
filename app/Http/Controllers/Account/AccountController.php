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

class AccountController extends Controller
{
    public function account(){
        $order = Order::orderBy('id', 'desc')->paginate(15);
        $total = Order::sum('total');
        $discount = Order::sum('discount');
        $payable = Order::sum('payable');
        $pay = Order::sum('pay');
        $due = Order::sum('due');
        $vat = Order::sum('vat');
        $expenses = Expenses::sum('amount');
        return view('total-transection-account.total-transection-account', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','expenses'));
    }

    public function printAccount(){
        $order = Order::orderBy('id', 'desc')->paginate(15);
        $total = Order::sum('total');
        $discount = Order::sum('discount');
        $payable = Order::sum('payable');
        $pay = Order::sum('pay');
        $due = Order::sum('due');
        $vat = Order::sum('vat');
        $expenses = Expenses::sum('amount');
        $company = Company::all();
        $reportDate = now()->format('d-m-Y');
        return view('total-transection-account.print-total-transection-account', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','expenses','company','reportDate'));
    }
}
