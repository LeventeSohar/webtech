<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnimalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('animals', function (Blueprint $table) {
            $table->id(); // auto-incrementing primary key
            $table->string('name'); // Name of the animal
            $table->string('species'); // Species (e.g., Dog, Cat, Rabbit)
            $table->string('breed')->nullable(); // Breed (optional)
            $table->enum('gender', ['male', 'female']); // Gender of the animal
            $table->date('date_of_birth')->nullable(); // Birthdate (optional)
            $table->date('date_of_arrival'); // Date the animal arrived at the shelter
            $table->string('color')->nullable(); // Color of the animal (optional)
            $table->float('weight')->nullable(); // Weight in kilograms (optional)
            $table->boolean('is_neutered')->default(false); // Neutering status
            $table->boolean('is_vaccinated')->default(false); // Vaccination status
            $table->boolean('is_microchipped')->default(false); // Microchipping status
            $table->string('microchip_number')->nullable(); // Microchip ID (optional)
            $table->text('medical_history')->nullable(); // Medical history (optional)
            $table->text('special_needs')->nullable(); // Special needs (optional)
            $table->text('personality_traits')->nullable(); // Personality traits (optional)
            $table->boolean('is_adoptable')->default(true); // If the animal is adoptable
            $table->date('adoption_date')->nullable(); // Adoption date (optional)
            $table->foreignId('adopted_by')->nullable()->constrained('users')->onDelete('set null'); // User who adopted the animal
            $table->foreignId('surrendered_by')->nullable()->constrained('users')->onDelete('set null'); // User who surrendered the animal
            $table->text('notes')->nullable(); // Additional notes (optional)
            $table->string('profile_picture')->nullable(); // Path to the profile picture (optional)
            $table->json('gallery')->nullable(); // JSON field for additional pictures (optional)

            $table->timestamps(); // Created at and Updated at timestamps
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('animals');
    }
}
