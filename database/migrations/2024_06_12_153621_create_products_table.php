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
            $table->text('image')->nullable();
            $table->string('name', 50);
            $table->text('description')->nullable();
            $table->decimal('price', 5, 2);
            $table->boolean('visible'); //->default(1)
            $table->unsignedInteger('discount');
            $table->boolean('featured'); //->default(0)
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
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
