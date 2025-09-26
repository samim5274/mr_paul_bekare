<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('purchasecarts', function (Blueprint $table) {
            $table->id();

            $table->date('date');
            $table->time('time')->nullable();

            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('chalan_reg')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->integer('branch')->default(0);

            $table->integer('order_qty')->default(1);
            $table->integer('ready_qty')->default(0);
            $table->integer('delivery_qty')->default(0);

            $table->integer('status')->default(1); // ['1 = pending','2 = Received']
            $table->string('remark')->nullable();

            $table->integer('unit_price')->nullable();
            $table->integer('total_price')->nullable();
            $table->string('unit')->nullable(); // e.g., pcs, kg, liter

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchasecarts');
    }
};
