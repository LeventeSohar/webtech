<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('volunteer_applications', function (Blueprint $table) {
            $table->id(); // Unique ID for each application
            $table->string('name'); // Name of the volunteer
            $table->string('email')->unique(); // Contact email
            $table->text('application_text'); // Application text
            $table->timestamps(); // Only created_at timestamp
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('volunteer_applications');
    }
};
