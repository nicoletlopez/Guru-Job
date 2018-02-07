<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyHasFileTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_has_file', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('file_id')->unsigned();

            $table->foreign('user_id')->references('user_id')->on('faculty');
            $table->foreign('file_id')->references('id')->on('file');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_has_file');
    }
}
