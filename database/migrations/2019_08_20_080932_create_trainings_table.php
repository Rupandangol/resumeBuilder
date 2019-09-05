<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrainingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trainings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('trainingName');
            $table->string('trainingCenter');
            $table->string('location');
            $table->string('startTime');
            $table->string('endTime');
            $table->text('description')->nullable();
            $table->integer('cv_id')->unsigned();
            $table->timestamps();
            $table->foreign('cv_id')->references('id')->on('personal_details')->onUpdate('cascade')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('trainings');
    }
}
