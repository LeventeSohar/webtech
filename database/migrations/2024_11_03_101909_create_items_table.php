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
        Schema::create('items', function (Blueprint $table) {
            $table->id();  // Primary key
            $table->string('name');  // Name column
            $table->text('description')->nullable();  // Optional description
            $table->decimal('price', 8, 2);  // Price with 2 decimal points
            $table->integer('quantity');  // Quantity
            $table->timestamps();  // Created and updated timestamps
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
