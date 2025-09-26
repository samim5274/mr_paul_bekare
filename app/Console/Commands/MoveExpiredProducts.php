<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Carbon\Carbon;

use App\Models\Product;
use App\Models\Stock;
use App\Models\ExpiredProduct;

class MoveExpiredProducts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:move-expired-products';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Move expired products to bin';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredProducts = Product::whereDate('expired', '<=', Carbon::now())->where('stock', '>', '0')->get();

        $count = 0;

        foreach ($expiredProducts as $product){
            // Check if already preserved
            $alreadyPreserved = ExpiredProduct::where('product_id', $product->id)->exists();
            if ($alreadyPreserved) {
                continue;
            }

            ExpiredProduct::create([
                'product_id' => $product->id,
                'name'       => $product->name,
                'price'      => $product->price,
                'quantity'   => $product->stock,
                'expired_at' => $product->expired,
            ]);

            Stock::create([
                'reg'       => now()->format('ymdHis') . $product->id,
                'date'       => now(),
                'product_id' => $product->id,
                'stockIn'   => 0,
                'stockOut'   => $product->stock,
                'remark' => 'Expired product moved to bin',
                'status' => '3',
            ]);

            $product->stock = 0;
            $product->save();

            $count++;
        }

        $this->info($count . ' expired products preserved in ProductBin.');

        //php artisan app:move-expired-products. this line runs every day at midnight via cron job
    }
}
