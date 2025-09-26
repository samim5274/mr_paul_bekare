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
        Schema::create('purchase_returns', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reg'); 
            $table->date('date');
            $table->foreignId('product_id')->constrained('products')->onDelete('restrict');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('quantity')->default(1); 
            $table->unsignedBigInteger('price')->nullable(); 
            $table->string('reason')->default('N/A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('purchase_returns');
    }
};
