<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalProfilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_profiles', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('lookingFor');
            $table->string('availableFor');
            $table->string('jobCategory');
            $table->string('expectedSalary');
            $table->string('jobCategoryTitle')->nullable();
            $table->string('preferredLocation')->nullable();
            $table->string('interestedInJob')->nullable();
            $table->string('license');
            $table->string('vehicle');
            $table->text('careerObjective');
            $table->integer('cv_id')->unsigned()->nullable();
            $table->timestamps();

            $table->foreign('cv_id')->references('id')->on('personal_details')->onDelete('cascade')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('personal_profiles');
    }
}
