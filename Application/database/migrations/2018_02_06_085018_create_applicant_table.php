<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicantTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('applicant', function (Blueprint $table) {
            //subject_id
            $table->integer('subject_id')->unsigned();
            $table->foreign('subject_id')->references('subject_id')->on('job');

            //skill_id
            $table->integer('skill_id')->unsigned();
            $table->foreign('skill_id')->references('skill_id')->on('job');

            //faculty_id
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');

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
        Schema::dropIfExists('applicant');
    }
}
