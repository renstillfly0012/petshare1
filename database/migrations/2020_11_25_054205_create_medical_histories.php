<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMedicalHistories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('medical_histories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_info_id')->nullable();
            $table->foreign('pet_info_id')->references('id')->on('pet_health_infos')->onDelete('cascade');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->string('date')->nullable();
            $table->string('description')->nullable();
            $table->string('diagnosis')->nullable();
            $table->string('test_performed')->nullable();
            $table->string('test_results')->nullable();
            $table->string('action')->nullable();
            $table->string('medications')->nullable();
            $table->string('comments')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('medical_histories');
    }
}
