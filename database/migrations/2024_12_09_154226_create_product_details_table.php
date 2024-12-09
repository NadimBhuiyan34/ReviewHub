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
        Schema::create('product_details', function (Blueprint $table) {
            $table->uuid('id')->primary(); 
            $table->foreignUuid('product_id')->constrained('products')->onDelete('cascade'); 
            $table->decimal('price', 10, 2); 
            $table->text('description'); 
            $table->string('model_no'); 
            $table->string('image')->nullable(); 
            $table->string('website_url')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_details');
    }
};
