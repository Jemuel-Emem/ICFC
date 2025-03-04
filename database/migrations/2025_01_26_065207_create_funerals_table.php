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
        Schema::create('funerals', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('gender');
            $table->string('religion')->nullable();
            $table->integer('age')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->date('date_of_death');
            $table->string('citizenship')->nullable();
            $table->string('residence')->nullable();
            $table->string('civil_status')->nullable();
            $table->string('occupation')->nullable();
            $table->date('funeral_date');
            $table->string('contact_person_name');
            $table->text('additional_information')->nullable();
            $table->string('status')->default('pending');
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
        Schema::dropIfExists('funerals');
    }
};
