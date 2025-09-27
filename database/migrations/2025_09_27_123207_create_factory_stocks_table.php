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
        Schema::create('factory_stocks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); 
            $table->unsignedBigInteger('product_id'); 
            $table->integer('quantity');               
            $table->decimal('price', 12, 2);               
            $table->text('reason')->nullable();        
            $table->date('return_date');               
            $table->integer('status')->default(0); // 1 stock in, 2 stock out
            $table->timestamps();

            $table->foreign('product_id')->references('id')->on('products')->onDelete('restrict');
            $table->foreign('user_id')->references('id')->on('admins')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('factory_stocks');
    }
};
