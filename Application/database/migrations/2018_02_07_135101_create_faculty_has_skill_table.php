<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyHasSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('faculty_has_skill', function (Blueprint $table) {
            $table->integer('user_id')->unsigned();
            $table->integer('skill_id')->unsigned();

            $table->foreign('user_id')->references('user_id')->on('faculty');
            $table->foreign('skill_id')->references('id')->on('skill');

            //misc
            $table->primary(['user_id','skill_id']);
            $table->index('user_id');
            $table->index('skill_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_has_skill');
    }
}
