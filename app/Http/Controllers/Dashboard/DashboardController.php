<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Expenses;
use App\Models\Branch;
use App\Models\Purchaseorder;
use App\Models\Purchasecart;
use App\Models\Product;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Category;
use App\Models\Subcategory;
use App\Models\DueCollection;
use Auth;

class DashboardController extends Controller
{
    public function index(){
        $today = Carbon::now()->toDateString();
        $last3day = Carbon::today()->addDays(3);
        
        $total = Order::where('date', Carbon::today())->sum('total');
        $discount = Order::where('date', Carbon::today())->sum('discount');
        $vat = Order::where('date', Carbon::today())->sum('vat');
        $payable = Order::where('date', Carbon::today())->sum('payable');
        $pay = Order::where('date', Carbon::today())->sum('pay');
        $due = Order::where('date', Carbon::today())->sum('due');
        $dueCollection = DueCollection::where('payment_date', Carbon::today())->sum('pay');

        $expenses = Expenses::where('date', Carbon::today())->sum('amount');

        $totalProduct = Product::count();
        $active = Product::where('availability', 1)->count();
        $deactive = Product::where('availability', 0)->count();

        $expiredSoon = Product::whereBetween('expired', [$today, $last3day])->count();
        $expired = Product::where('expired', '<=', Carbon::today())->count();

        $bracnh = Branch::count();

        $totalPhurchaseOrder = Purchasecart::where('date', Carbon::today())->sum('order_qty');
        $totalPhurchaseReady = Purchasecart::where('date', Carbon::today())->sum('ready_qty');
        $totalPhurchaseDelivery = Purchasecart::where('date', Carbon::today())->sum('delivery_qty');

        return view('welcome', compact('total', 'discount', 'vat', 'due', 'payable', 'pay','expenses','totalProduct', 'active', 'deactive','expired','expiredSoon','bracnh','totalPhurchaseOrder','totalPhurchaseReady','totalPhurchaseDelivery','dueCollection'));
    }

    public function chart(){
        $last7Days = collect();
        $dates = [];
        $sales = [];
        $dues = [];
        $dies = [];

        for ($i = 6; $i >= 0; $i--) {
            $date = Carbon::today()->subDays($i);
            $dates[] = $date->format('d M');
            $dayTotal = Order::whereDate('date', $date)->sum('pay');
            $dayDue = Order::whereDate('date', $date)->sum('due');
            $dayDis = Order::whereDate('date', $date)->sum('discount');
            $sales[] = (float)$dayTotal;
            $dues[] = (float)$dayDue;
            $dies[] = (float)$dayDis;
        }

        return view('chart.chart', compact('dates','sales','dues','dies'));
    }
}
