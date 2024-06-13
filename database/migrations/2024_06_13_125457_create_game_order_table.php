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
        Schema::create('game_order', function (Blueprint $table) {
            // Creazione colonna game_id & order_id
          $table->foreignId('game_id')->constrained()->cascadeOnDelete();
          $table->foreignId('order_id')->constrained()->cascadeOnDelete();
          
          $table->primary(['game_id', 'order_id']);

          $table->tinyInteger('quantity');
          $table->decimal('price', 5, 2);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('game_order');
    }
};
