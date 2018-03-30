<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateApplicationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('application', function (Blueprint $table) {
            $table->integer('faculty_id')->unsigned();
            $table->boolean('accepted')->unsigned()->default(false);
            $table->integer('job_id')->unsigned();
            $table->timestamps();

            $table->foreign('faculty_id')->references('user_id')->on('faculty');
            $table->foreign('job_id')->references('id')->on('job');

            //misc
            $table->primary(['user_id','job_id']);
            $table->index('user_id');
            $table->index('job_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('application');
    }
}
