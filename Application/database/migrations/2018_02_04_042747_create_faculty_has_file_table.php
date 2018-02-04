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
            $table->integer('faculty_id')->unsigned();
            $table->foreign('faculty_id')->references('faculty_id')->on('faculty');
            $table->integer('file_id')->unsigned();
            $table->foreign('file_id')->references('file_id')->on('file');
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
        Schema::dropIfExists('faculty_has_file');
    }
}
