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
        Schema::create('weddings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Foreign key to the users table
            $table->string('status')->default('pending'); // Default status of the wedding
            $table->string('groom_name');
            $table->date('groom_birthdate');
            $table->string('groom_place_of_birth');
            $table->integer('groom_age');
            $table->string('groom_residence');
            $table->string('groom_religion');
            $table->string('groom_civil_status');
            $table->string('groom_phone_number');
            $table->string('groom_fathers_name');
            $table->string('groom_citizenship');
            $table->string('groom_advisor_name');
            $table->string('groom_relationship_to_advisor');
            $table->string('bride_name');
            $table->date('bride_birthdate');
            $table->string('bride_place_of_birth');
            $table->integer('bride_age');
            $table->string('bride_residence');
            $table->string('bride_religion');
            $table->string('bride_civil_status');
            $table->string('bride_phone_number');
            $table->string('bride_fathers_name');
            $table->string('bride_citizenship');
            $table->string('bride_advisor_name');
            $table->string('bride_relationship_to_advisor');
            $table->date('wedding_date');
            $table->text('special_requests')->nullable();
            $table->string('time_schedule');
            $table->string('requirements')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('weddings');
    }
};
