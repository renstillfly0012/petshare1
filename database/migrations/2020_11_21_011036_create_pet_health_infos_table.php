<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePetHealthInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pet_health_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pet_owner_id')->nullable();
            $table->foreign('pet_owner_id')->references('id')->on('users')->onDelete('cascade');
            $table->unsignedBigInteger('pet_id')->nullable();
            $table->foreign('pet_id')->references('id')->on('pets')->onDelete('cascade');
            $table->string('pet_allergies');
            $table->string('pet_existing_conditions');
            $table->unsignedBigInteger('vet_id')->nullable();
            $table->foreign('vet_id')->references('id')->on('users')->onDelete('cascade');
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
        Schema::dropIfExists('pet_health_infos');
    }
}
