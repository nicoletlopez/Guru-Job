<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLectureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lecture', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->text('overview');
            $table->text('objectives')->nullable();
            $table->integer('faculty_id')->unsigned();

            $table->foreign('faculty_id')->references('id')->on('faculty');
            $table->timestamps();

            //misc
            $table->primary('id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('lecture');
    }
}
