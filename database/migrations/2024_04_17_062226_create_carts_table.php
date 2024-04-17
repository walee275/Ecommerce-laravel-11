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
        Schema::create('carts', function (Blueprint $table) {
            $table->id();
            $table->foreignId('product_id')->references('id')->on('products')->onDelete('CASCADE');
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('CASCADE');
            $table->foreignId('order_id')->nullable()->references('id')->on('orders')->onDelete('SET NULL');
            $table->float('price');
            $table->enum('status',['new','progress','delivered','cancel'])->default('new');
            $table->integer('quantity');
            $table->float('amount');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carts');
    }
};
