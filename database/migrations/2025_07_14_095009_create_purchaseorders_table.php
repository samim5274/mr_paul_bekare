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
        Schema::create('purchaseorders', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->date('delivary_date')->nullable();
            $table->time('time')->nullable();
            $table->foreignId('user_id')->constrained('admins')->onDelete('restrict');
            $table->integer('branch')->default(0);
            $table->unsignedBigInteger('chalan_reg')->unique();
            $table->decimal('total', 12, 2)->nullable();
            $table->decimal('discount', 12, 2)->nullable();
            $table->decimal('vat', 12, 2)->nullable();
            $table->decimal('payable', 12, 2)->nullable();
            $table->decimal('pay', 12, 2)->nullable();
            $table->bigInteger('due')->nullable();
            $table->Integer('status')->default(0); // ['1 = pending', '2 = processing', '3 = completed', '4 = delivery' , '0 = cancelled']
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchaseorders');
    }
};
