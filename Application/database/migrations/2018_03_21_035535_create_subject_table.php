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
            $table->string('name');
            $table->string('desc');
            $table->integer('hr_id')->unsigned();
            $table->integer('faculty_id')->unsigned();


            $table->foreign('hr_id')->references('user_id')->on('hr');
            $table->foreign('faculty_id')->references('user_id')->on('faculty');

            $table->timestamps();
            //misc
            $table->index('id');
            $table->index('hr_id');
            $table->index('faculty_id');
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
