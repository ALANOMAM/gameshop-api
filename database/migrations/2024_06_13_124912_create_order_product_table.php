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
        Schema::create('order_product', function (Blueprint $table) {
          // Creazione colonna order_id & product_id
          $table->foreignId('order_id')->constrained()->cascadeOnDelete();
          $table->foreignId('product_id')->constrained()->cascadeOnDelete();
          
          $table->primary(['order_id', 'product_id']);

          $table->tinyInteger('quantity');
          $table->decimal('price', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_product');
    }
};
