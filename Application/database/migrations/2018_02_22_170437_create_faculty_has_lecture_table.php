<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyHasLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_has_lecture', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('lecture_id')->unsigned();

            $table->foreign('user_id')->references('user_id')->on('faculty');
            $table->foreign('lecture_id')->references('id')->on('lecture');
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
        Schema::dropIfExists('faculty_has_lecture');
    }
}
