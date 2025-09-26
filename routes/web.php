<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Str;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Sale\SaleController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Report\ReportController;
use App\Http\Controllers\Branch\BranchController;
use App\Http\Controllers\Purchase\PurchaseController;
use App\Http\Controllers\Factory\FactoryController;
use App\Http\Controllers\Expenses\ExpensesController;
use App\Http\Controllers\Setting\SettingController;
use App\Http\Controllers\Permission\PermissionController;
use App\Http\Controllers\Bercode\BercodeController;
use App\Http\Controllers\Account\AccountController;
use App\Http\Controllers\Email\EmailController;
use App\Http\Controllers\Expired\ExpiredController;


Auth::routes();

Route::post('/user-login', [AdminController::class, 'userLogin']);

Route::get('/login', function() {
    return view('auth.login');
});

Route::get('/create-new-account', [AdminController::class, 'createAccount'])->name('create.new.account.view');
Route::post('/create-account', [AdminController::class, 'CreateAccountNew']);

Route::group(['middleware' => ['admin']], function() {

    Route::get('/', [DashboardController::class, 'index']);
    Route::get('/chart', [DashboardController::class, 'chart']);

    Route::get('/backup-database', function(){
        Artisan::call('backup:run', ['--only-db' => true]);

        $diskName = config('backup.backup.destination.disks')[0];
        $disk = Storage::disk($diskName);

        $files = collect($disk->allFiles(config('backup.backup.name')))
                    ->filter(fn ($file) => Str::endsWith($file, '.zip'))
                    ->sortDesc();

        $latestBackup = $files->first();

        if (!$latestBackup) {
            return back()->with('error', 'No backup file found!');
        }

        $path = $disk->path($latestBackup);

        return response()->download($path);
    })->name('download.db.backup');

    Route::get('/clear', function () {
        Artisan::call('config:clear');
        Artisan::call('cache:clear');
        Artisan::call('view:clear');
        Artisan::call('route:clear');

        return redirect()->back()->with('success','Caches cleared successfully.');
    });

    Route::get('/product-view', [ProductController::class, 'product'])->name('product.view');

    Route::post('/add-product', [ProductController::class, 'addProduct']);
    Route::get('/get-SubCategory/{id}', [ProductController::class, 'getSubcategory']);
    Route::get('/edit-product/{id}', [ProductController::class, 'editProduct']);
    Route::post('/update-product/{id}', [ProductController::class, 'updateProduct']);
    Route::get('/product-delete/{id}', [ProductController::class, 'delete']);
    Route::get('/product-stock', [ProductController::class, 'stockShow'])->name('product.stock.show');
    Route::post('/stock-in/{id}', [ProductController::class, 'stockIn']);

    Route::get('/sale-view', [SaleController::class, 'saleView'])->name('sale.view');
    Route::get('/search', [SaleController::class, 'liveSearch']);
    Route::get('/add-to-cart/{id}', [SaleController::class, 'addCart']);
    Route::get('/add-to-cart-2', [SaleController::class, 'addCart2']);
    Route::get('/cart-view', [SaleController::class, 'cartView']);
    Route::post('/cart/update-quantity', [SaleController::class, 'updateQuantity']);
    Route::get('/remove-to-cart/{id}/{reg}', [SaleController::class, 'removeCart']);

    Route::post('/confirm-order', [OrderController::class, 'confirmOrder']);
    Route::get('/sale-order-list', [OrderController::class, 'paymentOrder'])->name('order.payment');
    Route::post('/due-collection/{reg}', [OrderController::class, 'dueCollection']);
    Route::get('/sale-due-collection', [OrderController::class, 'dueCollectionView'])->name('sale-due-collection');
    Route::get('/print-all-order', [OrderController::class, 'printAllOrder']);
    Route::get('/specific-order-print/{reg}', [OrderController::class, 'specificOrderPrint'])->name('specific.order.print');
    Route::get('/return-order-list', [OrderController::class, 'returnOrderList'])->name('return.order.list.view');
    Route::get('/return-product-cart/{reg}', [OrderController::class, 'returnCart'])->name('return.cart');
    Route::get('/order-return-confirm/{reg}', [OrderController::class, 'returnConfirm']);
    Route::get('/print-return-list', [OrderController::class, 'printReturnList']);
    Route::get('/order-view/{reg}', [OrderController::class, 'orderViewByReg'])->name('order.view.by.reg');

    Route::get('/total-sale', [ReportController::class, 'totalSale'])->name('total.sale.view');
    Route::get('/print-total-sale', [ReportController::class, 'printTotalSale']);
    Route::get('/due-list', [ReportController::class, 'dueList'])->name('due.list.view');
    Route::get('/print-all-due-order', [ReportController::class, 'printDue']);
    Route::get('/due-collection-list', [ReportController::class, 'dueCollection'])->name('due-collection-list-view');
    Route::get('/print-all-due-collection', [ReportController::class, 'printDueCollection']);
    Route::post('/search-report-date-wise-due-collection-report', [ReportController::class, 'findDueCollectionReport']);
    Route::get('/paid-list', [ReportController::class, 'paidList'])->name('paid.list.view');
    Route::get('/print-all-paid-order', [ReportController::class, 'printPaid']);
    Route::get('/select-day-wise-sale-report', [ReportController::class, 'selsectDayWiseSaleReport'])->name('select.date.wise.sale.report.view');
    Route::post('/search-report-date-wise-sale-report', [ReportController::class, 'selsectDayWiseSaleReportFind']);
    Route::get('/select-day-wise-paid-sale-report', [ReportController::class, 'selsectDayWisePaidSaleReport'])->name('select.date.wise.paid.sale.report.view');
    Route::post('/search-report-date-wise-paid-sale-report', [ReportController::class, 'selsectDayWisePaidSaleReportFind']);
    Route::get('/select-day-wise-due-sale-report', [ReportController::class, 'selsectDayWiseDueSaleReport'])->name('select.date.wise.due.sale.report.view');
    Route::post('/search-report-date-wise-due-sale-report', [ReportController::class, 'selsectDayWiseDueSaleReportFind']);
    Route::get('/item-wise-sale', [ReportController::class, 'itemSale'])->name('item.sale.view');
    Route::get('/search-report-product', [ReportController::class, 'itemWiseSaleFind']);
    Route::get('/item-date-wise-sale', [ReportController::class, 'itemDateReport'])->name('item.date.report.view');
    Route::get('date-item-sale-report', [ReportController::class, 'dateItemReport']);
    Route::get('/category-wise-sale', [ReportController::class, 'categorySaleReport'])->name('category.sale.report.view');
    Route::get('/search-report-category', [ReportController::class, 'categorySaleReportFind']);
    Route::get('/category-date-sale', [ReportController::class, 'categoryDateReport'])->name('category.sale.date.report.view');
    Route::get('/search-report-date-category', [ReportController::class, 'categoryDateReportFind']);
    Route::get('/expired-list', [ReportController::class, 'ExpiredList']);
    Route::get('/search-expired-item', [ReportController::class, 'findExpiredItem']);
    Route::get('/payment-mathods', [ReportController::class, 'paymentMethod'])->name('payment-methods-wise-report-view');
    Route::get('/search-report-date-payment-method', [ReportController::class, 'findPaymentMethodSaleReport']);

    Route::get('/stock-report', [ReportController::class, 'stockReport'])->name('stock.report.view');
    Route::get('/print-total-stock', [ReportController::class, 'printStockReport']);
    Route::get('/product-stock-report', [ReportController::class, 'productStock']);
    Route::get('/item-stock-find', [ReportController::class, 'itemStockFind']);
    Route::get('/category-stock', [ReportController::class, 'categoryStock'])->name('category.stock.view');
    Route::get('/category-stock-find', [ReportController::class, 'categoryStockFind']);
    Route::get('/print-total-prodcut-stock', [ReportController::class, 'productStockReport']);
    Route::get('/print-product-stock-category', [ReportController::class, 'CategoryStockPrint']);

    Route::get('/branch', [BranchController::class, 'branch'])->name('branch.view');
    Route::post('/add-branch', [BranchController::class, 'addBranch']);
    Route::get('/update-branch/{id}', [BranchController::class, 'updateBranch']);

    Route::get('/purchase', [PurchaseController::class, 'purchaseView'])->name('purchase.view');
    Route::get('/make-purchase-order', [PurchaseController::class, 'purchaseCart']);
    Route::post('/update-purchase-cart-qty', [PurchaseController::class, 'updateQty']);
    Route::get('/remove-to-cart/{id}', [PurchaseController::class, 'removeFromCart']);
    Route::post('/confirm-purchase-order', [PurchaseController::class, 'confirmPurchase']);
    Route::get('/purchase-list', [PurchaseController::class, 'purchaseList'])->name('purchase.list.view');
    Route::get('/edit-purchase-order/{reg}', [PurchaseController::class, 'editPurchaseOrder']);
    Route::get('/update-order-qty/{reg}/{id}', [PurchaseController::class, 'UpdatePurchaseQty']);
    Route::get('/print-all-purchase-list', [PurchaseController::class, 'printPurchaseList']);
    Route::get('/print-specific-purchase-order/{reg}', [PurchaseController::class, 'printSpecificPurchaseOrder']);
    Route::get('/sale-return', [PurchaseController::class, 'purchaseReturn'])->name('purchase-return-view');
    Route::post('/purchase-return-confirm', [PurchaseController::class, 'purchaseReturnConfirm']);

    Route::get('/factory', [FactoryController::class, 'factoryView'])->name('factory.view');
    Route::get('/view-order-item/{reg}', [FactoryController::class, 'orderViewById']);
    Route::post('/purchase-status', [FactoryController::class, 'updateStatus']);
    Route::post('/update-ready-delivery-qty', [FactoryController::class, 'updateReadyDelivaryQty']);
    Route::get('/order-list-branch', [FactoryController::class, 'OrderListBranch']);
    Route::get('/search-branch-purchase-order', [FactoryController::class, 'findBranchAndOrder']);
    Route::get('/product-order', [FactoryController::class, 'productOrder']);
    Route::get('/search-product-wise-order-qty', [FactoryController::class, 'findOrderStock']);
    Route::get('/find-product-order/{id}', [FactoryController::class, 'findOrderStockId']);
    Route::get('/received-order', [FactoryController::class, 'receivedOrder']);
    Route::get('/search-date-received-purchase-order', [FactoryController::class, 'FindReceivedOrder']);
    Route::get('/delivery-order', [FactoryController::class, 'deliveryOrder']);
    Route::get('/search-date-purchase-order', [FactoryController::class, 'searchDeliveryOrder']);
    Route::get('/view-delivery-item/{reg}', [FactoryController::class, 'deliveryCart']);
    Route::get('/stock-received/{p_id}/{reg}', [FactoryController::class, 'stockReceived']);
    Route::get('/print-all-product-order-list', [FactoryController::class, 'printProductPurchaseOrder']);

    Route::get('/expenses-view', [ExpensesController::class, 'expensesView'])->name('expenses.view');
    Route::get('/getSubCategory/{id}', [ExpensesController::class, 'getSubcategory']);
    Route::post('/daily-expenses', [ExpensesController::class, 'expenses']);
    Route::get('/edit-expenses/{id}', [ExpensesController::class, 'editExpenses']);
    Route::get('/update-expenses/{id}', [ExpensesController::class, 'updateExpenses']);
    Route::get('/specific-expenses-list-print/{id}', [ExpensesController::class, 'expensesSpecificPrint']);
    Route::get('/print-expenses-list', [ExpensesController::class, 'expensesListPrint']);
    Route::get('/expenses-setting', [ExpensesController::class, 'settingView'])->name('expenses-setting-view');
    Route::post('/edit-expenses-category/{category}', [ExpensesController::class, 'editExCategory']);
    Route::get('/expenses-details', [ExpensesController::class, 'expensesDetails'])->name('expenses-report-view');
    Route::post('/search-report-date-wise-expenses-report', [ExpensesController::class, 'findExpenses']);

    Route::get('/profile', [AdminController::class, 'profile'])->name('profile.view');
    Route::get('/edit-profile', [AdminController::class, 'editProfile'])->name('profile.edit.view');
    Route::post('/update-profile/{id}', [AdminController::class, 'updateProfile']);
    Route::get('/account-permission', [AdminController::class, 'permission'])->name('account.permission.view');
    Route::get('/account-status/{id}', [AdminController::class, 'updateStatus']);
    Route::get('/profile-permission/{id}', [AdminController::class, 'permissionViewId']);
    Route::post('/update-user-permission', [AdminController::class, 'updatePermission']);

    Route::get('/setting', [SettingController::class, 'setting'])->name('setting.view');
    Route::post('/change-password', [SettingController::class, 'changePass']);

    Route::get('/permission', [PermissionController::class, 'permission'])->name('user.permission.view');
    Route::get('/user-permission-update', [PermissionController::class, 'permissionUpdate']);

    Route::get('/ber-code', [BercodeController::class, 'berCodeView'])->name('product-bercode-view');
    Route::get('/generate/bercode/{product_id}', [BercodeController::class, 'generateBercode']);
    Route::post('/print-bercode/{product_id}', [BercodeController::class, 'printBercode']);

    Route::get('/account-details', [AccountController::class, 'account'])->name('total-transection-account-view');
    Route::get('/print-closing-balance', [AccountController::class, 'printAccount']);

    Route::get('/expired-product', [ExpiredController::class, 'productList'])->name('expired-product-list-view');
    Route::post('/update-stock/{product_id}', [ExpiredController::class, 'expiredProductQty']);
    Route::get('/search/product', [ExpiredController::class, 'liveSearch']);

    // ================================================== Email section route ==================================================
    Route::get('/send-email', [EmailController::class, 'sendEmail']);
});