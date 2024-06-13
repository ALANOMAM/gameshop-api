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
        Schema::create('product_rating', function (Blueprint $table) {
            // Creazione colonna product_id & rating_id
          $table->foreignId('product_id')->constrained()->cascadeOnDelete();
          $table->foreignId('rating_id')->constrained()->cascadeOnDelete();
          
          $table->primary(['product_id', 'rating_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product_rating');
    }
};
