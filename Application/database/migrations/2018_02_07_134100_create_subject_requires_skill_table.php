<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectRequiresSkillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_requires_skill', function (Blueprint $table) {
            $table->integer('subject_id')->unsigned();
            $table->integer('skill_id')->unsigned();

            $table->foreign('subject_id')->references('id')->on('subject');
            $table->foreign('skill_id')->references('id')->on('skill');

            //misc
            $table->primary(['subject_id','skill_id']);
            $table->index('subject_id');
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
        Schema::dropIfExists('subject_requires_skill');
    }
}
