<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateResumeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('resume', function (Blueprint $table) {
            $table->integer('id')->unsigned();
            $table->integer('section_id')->unsigned();
            $table->text('section_title');
            $table->text('section_content');
            $table->integer('faculty_id')->unsigned();
            $table->timestamps();

            $table->foreign('faculty_id')->references('user_id')->on('faculty');

            //composite primary key = resume_id + section_id
            $table->primary(['id','section_id']);
            $table->index(['id','section_id','faculty_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('resume');
    }
}
