<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->integer('age')->nullable();
            $table->unsignedTinyInteger('type'); // 1 = Dog, 2 = Cat, 3 = Bird, 4 = Other
            $table->text('description')->nullable(); // Additional details (species, gender, etc.)
            $table->string('image')->nullable(); // URL or path to an image
            $table->timestamps(); // Only created_at timestamp
        });
    }




    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('animals');
    }
};
