<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Carbon;

use App\Models\Order;
use App\Models\Cart;
use Auth;
use App\Models\Purchaseorder;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    

    public function boot(): void
    {
        Paginator::useBootstrapFive();
        View::composer('layouts.*', function ($view) {
            $cartCount = 0;
            if (Auth::guard('admin')->check()) {
                $user = Auth::guard('admin')->user();
                $userId = $user->id;

                $orderCount = Order::count() + 1;

                $reg = Carbon::now()->format('Ymd') . str_pad($userId, 2, '0', STR_PAD_LEFT) . str_pad($orderCount, 4, '0', STR_PAD_LEFT);

                $cartCount = Cart::where('reg', $reg)->count();
            }
            $date = Carbon::now()->format('Y-m-d');
            // ['1 = pending', '2 = processing', '3 = completed', '4 = delivery' , '0 = cancelled']
            $purchaseOrderCancel = Purchaseorder::where('date', $date)->where('status', 0)->count();
            $purchaseOrderPendding = Purchaseorder::where('date', $date)->where('status', 1)->count();
            $purchaseOrderProcessing = Purchaseorder::where('date', $date)->where('status', 2)->count();
            $purchaseOrderComplete = Purchaseorder::where('date', $date)->where('status', 3)->count();
            $purchaseOrderDelivery = Purchaseorder::where('date', $date)->where('status', 4)->count();
            
            $view->with([
                'cart' => $cartCount,
                'purchaseOrderCancel' => $purchaseOrderCancel,
                'purchaseOrderPendding' => $purchaseOrderPendding,
                'purchaseOrderProcessing' => $purchaseOrderProcessing,
                'purchaseOrderComplete' => $purchaseOrderComplete,
                'purchaseOrderDelivery' => $purchaseOrderDelivery,
            ]);
        });
    }
}
