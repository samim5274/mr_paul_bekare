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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('catId')->constrained('excategories')->onDelete('restrict');
            $table->foreignId('subcatId')->constrained('exsubcategories')->onDelete('restrict');
            $table->foreignId('userId')->constrained('admins')->onDelete('restrict');
            $table->date('date');
            $table->decimal('amount', 12, 2);
            $table->text('remark')->default('N/A');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('expenses');
    }
};
