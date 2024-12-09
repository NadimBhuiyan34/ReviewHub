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
            $table->uuid('id')->primary(); // Primary key as UUID
            $table->string('name');
            $table->foreignUuid('brand_id')->constrained('brands')->onDelete('cascade'); 
            $table->foreignUuid('shop_id')->constrained('shops')->onDelete('cascade'); 
            $table->foreignUuid('category_id')->constrained('categories')->onDelete('cascade'); 
            $table->string('type');
            $table->integer('stock');
            $table->string('status'); // e.g., 'active' or 'inactive'
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
