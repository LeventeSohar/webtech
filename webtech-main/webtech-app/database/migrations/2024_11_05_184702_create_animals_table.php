<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->enum('type', ['dog', 'cat', 'rodent']); // Define the animal types
            $table->string('size')->nullable();
            $table->integer('age')->nullable(); 
            $table->string('color')->nullable(); 
            $table->text('description')->nullable();
            $table->boolean('garden_needed')->default(false);
            $table->string('picture')->nullable(); 
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
}

