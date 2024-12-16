<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // Only add the 'deleted_at' column if it doesn't already exist
        if (!Schema::hasColumn('posts', 'deleted_at')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->softDeletes(); // Adds a nullable "deleted_at" column
            });
        }
    }

    public function down()
    {
        // Remove the 'deleted_at' column if it exists
        if (Schema::hasColumn('posts', 'deleted_at')) {
            Schema::table('posts', function (Blueprint $table) {
                $table->dropSoftDeletes(); // Removes the "deleted_at" column
            });
        }
    }
};
