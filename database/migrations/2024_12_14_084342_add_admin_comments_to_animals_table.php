<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAdminCommentsToAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('animals', function (Blueprint $table) {
            $table->text('admin_comments')->nullable(); // Adding the column
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        //Schema::table('animals', function (Blueprint $table) {
            //$table->dropColumn('admin_comments'); // Dropping the column
        //});
    }
}
