<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferencesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('references', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('designation')->nullable();
            $table->string('companyName')->nullable();
            $table->string('contactNumber')->nullable();
            $table->string('email')->nullable();
            $table->integer('cv_id')->unsigned()->nullable();
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
        Schema::dropIfExists('references');
    }
}
