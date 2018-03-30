<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyHasSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_has_specialization', function (Blueprint $table) {
            $table->integer('faculty_id')->unsigned();
            $table->integer('specialization_id')->unsigned();

            $table->foreign('faculty')->references('user_id')->on('faculty');
            $table->foreign('specialization_id')->references('id')->on('specialization');

            //misc
            $table->primary(['faculty_id','specialization_id']);
            $table->index(['faculty_id','specialization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_has_specialization');
    }
}
