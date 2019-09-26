<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonalDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personal_details', function (Blueprint $table) {
            $table->Increments('id');
            $table->string('fullName');
            $table->string('email');
            $table->string('countryCode');
            $table->string('mobileNo');
            $table->string('website')->nullable();
            $table->string('image')->nullable();
            $table->string('address');
            $table->string('dateOfBirth')->nullable();
            $table->string('gender');
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
        Schema::dropIfExists('personal_details');
    }
}
