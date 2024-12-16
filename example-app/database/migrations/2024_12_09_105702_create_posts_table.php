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
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('author'); // Author of the post
            $table->string('title');  // Title of the post
            $table->text('content'); // Content of the post
            $table->timestamps();    // Created at and updated at timestamps
           
            $table->string('status')->default('draft'); // Possible values: draft, published


        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('posts');
    }
};
