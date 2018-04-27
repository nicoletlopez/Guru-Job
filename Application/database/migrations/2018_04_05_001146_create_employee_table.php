<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEmployeeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employee', function (Blueprint $table) {
            $table->integer('faculty_id')->unsigned();
            $table->integer('hr_id')->unsigned();

            $table->foreign('faculty_id')->references('user_id')->on('faculty');
            $table->foreign('hr_id')->references('user_id')->on('hr');

            $table->timestamps();

            //misc
            $table->primary(['faculty_id','hr_id']);
            $table->index(['faculty_id','hr_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('employee');
    }
}
