<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserHasLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_has_lecture', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('lecture_id')->unsigned();

            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('lecture_id')->references('id')->on('lecture');

            $table->primary(['user_id','lecture_id']);
            $table->index(['user_id','lecture_id']);

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
        Schema::dropIfExists('user_has_lecture');
    }
}
