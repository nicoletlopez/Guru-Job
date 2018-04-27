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
            $table->increments('id')->unsigned();
            $table->integer('faculty_id')->unsigned();
            $table->integer('template');
            $table->boolean('is_main')->default(false);
            $table->timestamps();

            $table->foreign('faculty_id')->references('user_id')->on('faculty');

            //misc
            $table->index('faculty_id');
            $table->index('id');
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
