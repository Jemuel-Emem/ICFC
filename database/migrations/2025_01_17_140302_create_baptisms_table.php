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
        Schema::create('baptisms', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->string('child_name');
            $table->date('child_dob');
            $table->string('child_gender');
            $table->string('child_place_of_birth');
            $table->string('family_connection');
            $table->string('child_nationality');
            $table->string('mother_name');
            $table->string('father_name');
            $table->string('residence');
            $table->string('parents_phone_number');
            $table->date('preferred_baptism_date');
            $table->string('time_schedule');
            $table->string('requirements')->nullable();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('baptisms');
    }
};
