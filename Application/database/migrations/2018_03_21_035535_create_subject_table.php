<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('job_id')->unsigned()->nullable();
            $table->string('name');
            $table->integer('faculty_id')->unsigned()->nullable();
            $table->text('desc');


            $table->foreign('user_id')->references('user_id')->on('hr');
            $table->foreign('job_id')->references('id')->on('job');
            $table->foreign('faculty_id')->references('user_id')->on('faculty');

            $table->timestamps();
            //misc
            $table->index('id');
            $table->index('user_id');
            $table->index('job_id');
            $table->index('name');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject');
    }
}
