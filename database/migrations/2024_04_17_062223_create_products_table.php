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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('slug')->unique();
            $table->text('summary');
            $table->longText('description')->nullable();
            $table->text('photo');
            $table->integer('stock')->default(1);
            $table->string('size')->default('M')->nullable();
            $table->enum('condition', ['default', 'new', 'hot'])->default('default');
            $table->enum('status', ['active', 'inactive'])->default('inactive');
            $table->float('price');
            $table->float('discount')->nullabale();
            $table->boolean('is_featured')->deault(false);
            $table->foreignId('brand_id')->nullable()->references('id')->on('brands')->onDelete('SET NULL');
            $table->foreignId('cat_id')->nullable()->references('id')->on('categories')->onDelete('SET NULL');
            $table->foreignId('child_cat_id')->nullable()->references('id')->on('categories')->onDelete('SET NULL');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
