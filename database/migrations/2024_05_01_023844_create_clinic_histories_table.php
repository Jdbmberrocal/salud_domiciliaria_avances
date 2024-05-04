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
        Schema::create('clinic_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('patient_id');
            $table->foreign('patient_id')->references('id')->on('users');

            $table->unsignedBigInteger('professional_id');
            $table->foreign('professional_id')->references('id')->on('users');

            $table->integer('weight')->nullable();
            $table->integer('size')->nullable();
            $table->integer('pulse')->nullable();
            $table->float('temperature')->nullable();
            $table->string('blood_pressure')->nullable();//tension arterial
            $table->string('general_state')->nullable();
            
            $table->dateTime('date_time')->nullable();
            $table->string('antecedent')->nullable();
            $table->string('professional_concept')->nullable();
            $table->string('recommendations')->nullable();
            $table->boolean('state');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_histories');
    }
};
