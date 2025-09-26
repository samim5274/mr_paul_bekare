<?php

namespace App\Http\Controllers\Report;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\Product;
use App\Models\Company;
use App\Models\Cart;
use App\Models\Order;
use App\Models\Stock;
use App\Models\Category;
use App\Models\PaymentMethod;
use App\Models\DueCollection;
use Auth;

class ReportController extends Controller
{
    public function totalSale(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::orderBy('id', 'desc')->paginate(15);
        $total = Order::where('date', $date)->sum('total');
        $discount = Order::where('date', $date)->sum('discount');
        $payable = Order::where('date', $date)->sum('payable');
        $pay = Order::where('date', $date)->sum('pay');
        $due = Order::where('date', $date)->sum('due');
        $vat = Order::where('date', $date)->sum('vat');
        return view('report.sale.total-sale-report', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function printTotalSale(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::where('date', $date)->orderBy('id', 'desc')->get();
        $total = Order::where('date', $date)->sum('total');
        $discount = Order::where('date', $date)->sum('discount');
        $payable = Order::where('date', $date)->sum('payable');
        $pay = Order::where('date', $date)->sum('pay');
        $due = Order::where('date', $date)->sum('due');
        $vat = Order::where('date', $date)->sum('vat');
        $company = Company::all();
        return view('report.print.printTotalSale', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','company'));
    }

    public function dueList() {
        $date = Carbon::now()->format('Ymd');
        $order = Order::where('date', $date)->where('status', 3)->orderBy('id', 'desc')->paginate(15);
        $total = Order::where('date', $date)->where('status', 3)->sum('total');
        $discount = Order::where('date', $date)->where('status', 3)->sum('discount');
        $payable = Order::where('date', $date)->where('status', 3)->sum('payable');
        $pay = Order::where('date', $date)->where('status', 3)->sum('pay');
        $due = Order::where('date', $date)->where('status', 3)->sum('due');
        $vat = Order::where('date', $date)->where('status', 3)->sum('vat');
        return view('report.sale.total-due-report', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function printDue(){
        $date = Carbon::now()->format('Ymd');
        $order = Order::where('date', $date)->where('status', 3)->orderBy('id', 'desc')->get();
        $total = Order::where('date', $date)->where('status', 3)->sum('total');
        $discount = Order::where('date', $date)->where('status', 3)->sum('discount');
        $payable = Order::where('date', $date)->where('status', 3)->sum('payable');
        $pay = Order::where('date', $date)->where('status', 3)->sum('pay');
        $due = Order::where('date', $date)->where('status', 3)->sum('due');
        $vat = Order::where('date', $date)->where('status', 3)->sum('vat');
        $company = Company::all();
        return view('report.print.printDuelist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','company'));
    }

    public function dueCollection(){
        $date = Carbon::now()->format('Ymd');
        $dueList = DueCollection::where('payment_date', $date)->orderBy('id', 'desc')->paginate(15);
        $pay = DueCollection::where('payment_date', $date)->sum('pay');
        $due = DueCollection::where('payment_date', $date)->sum('due');
        return view('report.sale.total-due-collection-report', compact('dueList', 'pay', 'due'));
    }

    public function printDueCollection(){
        $date = Carbon::now()->format('Ymd');
        $order = DueCollection::where('payment_date', $date)->orderBy('id', 'desc')->get();
        $pay = DueCollection::where('payment_date', $date)->sum('pay');
        $due = DueCollection::where('payment_date', $date)->sum('due');
        $company = Company::all();
        return view('report.print.printDueCollection', compact('order', 'pay', 'due', 'company'));
    }

    public function findDueCollectionReport(Request $request){
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $order = DueCollection::whereBetween('payment_date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        if(empty($order)){
            return redirect()->back()->with('error', 'Day wise data not found. Please try to find another day wise data searching. Thanks');
        }
        $due = DueCollection::whereBetween('payment_date', [$start, $end])->sum('due');
        $pay = DueCollection::whereBetween('payment_date', [$start, $end])->sum('pay');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.printDueCollection', compact('order', 'pay', 'due', 'start','end','company'));
        }
        return view('report.sale.total-due-collection', compact('order','pay', 'due'));
    }

    public function paidList(){
        $order = Order::where('status', 2)->orderBy('id', 'desc')->paginate(15);
        $total = Order::where('status', 2)->sum('total');
        $discount = Order::where('status', 2)->sum('discount');
        $payable = Order::where('status', 2)->sum('payable');
        $pay = Order::where('status', 2)->sum('pay');
        $due = Order::where('status', 2)->sum('due');
        $vat = Order::where('status', 2)->sum('vat');
        return view('report.sale.total-paid-report', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function printPaid() {
        $order = Order::where('status', 2)->orderBy('id', 'desc')->paginate(15);
        $total = Order::where('status', 2)->sum('total');
        $discount = Order::where('status', 2)->sum('discount');
        $payable = Order::where('status', 2)->sum('payable');
        $pay = Order::where('status', 2)->sum('pay');
        $due = Order::where('status', 2)->sum('due');
        $vat = Order::where('status', 2)->sum('vat');
        $company = Company::all();
        return view('report.print.printPaidlist', compact('order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat', 'company'));
    }

    public function selsectDayWiseSaleReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $data = Order::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->sum('vat');
        return view('report.sale.select-date-wise-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function selsectDayWiseSaleReportFind(Request $request) {
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $data = Order::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        if(empty($data)){
            return redirect()->back()->with('error', 'Day wise data not found. Please try to find another day wise data searching. Thanks');
        }
        $total = Order::whereBetween('date', [$start, $end])->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->sum('vat');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.printSelectDayTotalSale', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','start','end','company'));
        }
        return view('report.sale.select-date-wise-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function selsectDayWisePaidSaleReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $data = Order::whereBetween('date', [$start, $end])->where('status', 2)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('vat');
        return view('report.sale.select-date-wise-paid-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function selsectDayWisePaidSaleReportFind(Request $request) {
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $data = Order::whereBetween('date', [$start, $end])->where('status', 2)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 2)->sum('vat');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.printSelectDayTotalPaidSale', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','start','end','company'));
        }
        return view('report.sale.select-date-wise-paid-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function selsectDayWiseDueSaleReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $data = Order::whereBetween('date', [$start, $end])->where('status', 3)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('vat');
        return view('report.sale.select-date-wise-due-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function selsectDayWiseDueSaleReportFind(Request $request) {
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $data = Order::whereBetween('date', [$start, $end])->where('status', 3)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('status', 3)->sum('vat');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.printSelectDayTotalDueSale', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat','start','end','company'));
        }
        return view('report.sale.select-date-wise-due-sale-report', compact('data', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function itemSale(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $product = Product::all();
        $cart = Cart::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->sum('price');
        return view('report.sale.itemSaleReport', compact('cart', 'price', 'product'));
    }

    public function itemWiseSaleFind(Request $request) {
        $item = $request->input('cbxProduct', '');
        $product = Product::all();
        $cart = Cart::where('product_id', $item)->orderBy('id', 'desc')->paginate(15);
        $price = Cart::where('product_id', $item)->sum('price');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.itemWiseReportPrint', compact('cart', 'price', 'product','item','company'));
        }
        return view('report.sale.item-wise-report', compact('cart', 'price', 'product'));
    }

    public function itemDateReport(){
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $product = Product::all();
        $cart = Cart::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->sum('price');
        return view('report.sale.itemDateSaleReport', compact('cart', 'price', 'product'));
    }

    public function dateItemReport(Request $request) {
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $item = $request->input('cbxProduct', '');
        if(!$item){
            return redirect()->back()->with('warning', 'You need must be select item.');
        }
        $product = Product::all();
        $price = Cart::where('product_id', $item)->whereBetween('date', [$start, $end])->sum('price');
        $cart = Cart::where('product_id', $item)->whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.itemDateSaleReportPrint', compact('cart', 'price', 'product','start','end','company'));
        }
        return view('report.sale.itemDateSaleReport', compact('cart', 'price', 'product','start','end'));
    }

    public function categorySaleReport(){
        $category = Category::all();
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $cart = Cart::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->sum('price');
        return view('report.sale.categorySaleReport', compact('category','cart','price'));
    }

    public function categorySaleReportFind(Request $request){
        $category = Category::all();
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $catId = $request->input('cbxCategory','');
        if(!$catId){
            return redirect()->back()->with('warning', 'You need must be select Category.');
        }
        $findCatName = Category::where('id', $catId)->first();
        $productId = Product::where('category_id', $catId)->pluck('id');
        $cart = Cart::whereBetween('date', [$start, $end])->whereIn('product_id', $productId)->with('product')->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->whereIn('product_id', $productId)->sum('price');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.categorySaleReportPrint', compact('category','cart','price','start','end','findCatName','company'));
        }
        return view('report.sale.categorySaleReport', compact('category','cart','price'));
    }

    public function categoryDateReport(){
        $category = Category::all();
        $start = Carbon::now()->format('Ymd');
        $end = Carbon::now()->format('Ymd');
        $cart = Cart::whereBetween('date', [$start, $end])->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->sum('price');
        return view('report.sale.categoryDateSaleReport', compact('category','cart','price'));
    }

    public function categoryDateReportFind(Request $request){
        $category = Category::all();
        $catId = $request->input('cbxCategory','');
        if(!$catId){
            return redirect()->back()->with('warning', 'You need must be select Category.');
        }
        $findCatName = Category::where('id', $catId)->first();
        $start = $request->input('dtpStartDate','');
        $end = $request->input('dtpEndDate','');
        $productId = Product::where('category_id', $catId)->pluck('id');
        $cart = Cart::whereBetween('date', [$start, $end])->whereIn('product_id', $productId)->with('product')->orderBy('id', 'desc')->paginate(15);
        $price = Cart::whereBetween('date', [$start, $end])->whereIn('product_id', $productId)->with('product')->sum('price');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.categoryDateSaleReportPrint', compact('category','cart','price','start','end','findCatName','company'));
        }
        return view('report.sale.categoryDateSaleReport', compact('category','cart','price'));
    }

    public function paymentMethod(){
        $paymentMethods = PaymentMethod::all();
        $order = Order::orderBy('id', 'desc')->paginate(15);
        $total = Order::sum('total');
        $discount = Order::sum('discount');
        $payable = Order::sum('payable');
        $pay = Order::sum('pay');
        $due = Order::sum('due');
        $vat = Order::sum('vat');
        return view('report.sale.payment-method-sale-report', compact('paymentMethods','order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }

    public function findPaymentMethodSaleReport(Request $request){
        $start = $request->input('dtpStartDate', '');
        $end = $request->input('dtpEndDate', '');
        $payMethod = $request->input('cbxPayMethod', '');
        if(empty($start) || empty($end) || empty($payMethod)){
            return redirect()->back()->with('error', 'You need must be set date duration and payment method. Thank You.');
        }
        $order = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->orderBy('id', 'desc')->paginate(15);
        $total = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('total');
        $discount = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('discount');
        $payable = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('payable');
        $pay = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('pay');
        $due = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('due');
        $vat = Order::whereBetween('date', [$start, $end])->where('paymentMethod', $payMethod)->sum('vat');
        $company = Company::all();
        $paymentMethods = PaymentMethod::all();
        if ($request->has('print')) {
            return view('report.print.payment-method-sale-report-print', compact('company','order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
        }
        return view('report.sale.payment-method-sale-report', compact('paymentMethods','company','order', 'total', 'discount', 'payable', 'payable', 'pay', 'due', 'vat'));
    }














    public function stockReport() {
        $product = Product::paginate(20);
        $stock = Product::sum('stock');
        $price = Product::sum('price');
        return view('report.stock.totalStock', compact('product','stock','price'));
    }

    public function printStockReport(){
        $product = Product::all();
        $stock = Product::sum('stock');
        $price = Product::sum('price');
        $company = Company::all();
        return view('report.stock.totalStockPrint', compact('product','stock','price','company'));
    }

    public function productStock(){
        $product = Product::all();

        $stockSummary = DB::table('stocks')
                            ->select('product_id', 
                                DB::raw('SUM(stockIn) as total_in'), 
                                DB::raw('SUM(stockOut) as total_out'))
                            ->groupBy('product_id')->get();

        $totalStockIn = $stockSummary->sum('total_in');
        $totalStockOut = $stockSummary->sum('total_out');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        
        return view('report.stock.productStock', compact('product','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut'));
    }

    public function productStockReport(){
        $product = Product::all();

        $stockSummary = DB::table('stocks')
                            ->select('product_id', 
                                DB::raw('SUM(stockIn) as total_in'), 
                                DB::raw('SUM(stockOut) as total_out'))
                            ->groupBy('product_id')->get();

        $totalStockIn = $stockSummary->sum('total_in');
        $totalStockOut = $stockSummary->sum('total_out');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        $company = Company::all();
        return view('report.stock.printProductStock', compact('product','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut','company'));
    }

    public function itemStockFind(Request $request){
        $product = Product::all();
        $item = $request->input('cbxProduct', '');        
        if(!$item){
            return redirect()->back()->with('warning', 'You need must be select Product.');
        }
        $stock = Stock::where('product_id', $item)->get();
        $stockIn = Stock::where('product_id', $item)->sum('stockIn');
        $stockOut = Stock::where('product_id', $item)->sum('stockOut');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.stock.productStockPrint', compact('product','stock','stockOut','stockIn','company'));
        }
        return view('report.stock.productStock', compact('product','stock','stockOut','stockIn'));
    }

    public function categoryStock(){
        $category = Category::all();
        $stockSummary = DB::table('stocks')
                            ->select('product_id', 
                                DB::raw('SUM(stockIn) as total_in'), 
                                DB::raw('SUM(stockOut) as total_out'))
                            ->groupBy('product_id')->get();

        $totalStockIn = $stockSummary->sum('total_in');
        $totalStockOut = $stockSummary->sum('total_out');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        return view('report.stock.productStockCategory', compact('category','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut'));
    }

    public function CategoryStockPrint(){
        $category = Category::all();
        $stockSummary = DB::table('stocks')
                            ->select('product_id', 
                                DB::raw('SUM(stockIn) as total_in'), 
                                DB::raw('SUM(stockOut) as total_out'))
                            ->groupBy('product_id')->get();

        $totalStockIn = $stockSummary->sum('total_in');
        $totalStockOut = $stockSummary->sum('total_out');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );
        $company = Company::all();
        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::whereIn('id', $productIds)->get()->keyBy('id');
        return view('report.stock.printProductStockCategory', compact('category','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut','company'));
    }

    public function categoryStockFind(Request $request){
        $category = Category::all();
        $catId = $request->input('cbxCategory','');
        $productIdsByCategory = Product::where('category_id', $catId)->pluck('id')->toArray();
        $stockSummary = DB::table('stocks')
                            ->select('product_id', 
                                DB::raw('SUM(stockIn) as total_in'), 
                                DB::raw('SUM(stockOut) as total_out'))
                            ->whereIn('product_id', $productIdsByCategory)
                            ->groupBy('product_id')->get(); 

        $totalStockIn = $stockSummary->sum('total_in');
        $totalStockOut = $stockSummary->sum('total_out');

        $perPage = 20;
        $currentPage = LengthAwarePaginator::resolveCurrentPage();

        $paginatedSummary = new LengthAwarePaginator(
            $stockSummary->forPage($currentPage, $perPage),
            $stockSummary->count(),
            $perPage,
            $currentPage,
            ['path' => request()->url(), 'query' => request()->query()]
        );

        $productIds = $paginatedSummary->pluck('product_id')->toArray();
        $products = Product::with('category')->whereIn('id', $productIds)->get()->keyBy('id');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.stock.productStockCategoryPrint', compact('category','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut','company'));
        }
        // dd($catId, $productIdsByCategory, $stockSummary, $paginatedSummary, $productIds, $products);
        return view('report.stock.productStockCategory', compact('category','products','stockSummary','paginatedSummary','totalStockIn','totalStockOut'));
    }

    public function ExpiredList(){
        $product = Product::whereBetween('expired', [Carbon::today(), Carbon::today()->addDays(3)])->get();
        return view('report.product.expired-list', compact('product'));
    }

    public function findExpiredItem(Request $request){
        $start = $request->input('dtpStart', '');
        $end = $request->input('dtpEnd', '');
        if(empty($start) || empty($end)){
            return redirect()->back()->with('error', 'You need must be set date duration.');
        }
        $product = Product::whereBetween('expired', [$start, $end])->get();
        $total = Product::whereBetween('expired', [$start, $end])->sum('price');
        $company = Company::all();
        if ($request->has('print')) {
            return view('report.print.expired-list-print', compact('product','start','end','total','company'));
        }
        return view('report.product.expired-list', compact('product'));
    }
}
