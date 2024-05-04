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
        Schema::create('clinic_evolutions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('clinic_history_id');
            $table->foreign('clinic_history_id')->references('id')->on('clinic_histories');

            $table->string('patient_information')->nullable();
            $table->string('medical_concept')->nullable();
            $table->string('principal_diagnostic')->nullable();
            $table->string('related_diagnosis')->nullable();//opcional
            $table->enum('type_diagnosis',['Nuevo','Presuntivo','Sintomático','Anatomico','Direfencial','Certeza']);
            $table->enum('forecast',['Bueno','Regular','Malo']);
            $table->enum('exit',['Si','No']);
            $table->dateTime('date_hours')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clinic_evolutions');
    }
};
