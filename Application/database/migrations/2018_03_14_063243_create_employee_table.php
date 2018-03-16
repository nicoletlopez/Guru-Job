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
            $table->integer('hr_id')->unsigned();
            $table->integer('faculty_id')->unsigned();

            $table->foreign('hr_id')->references('user_id')->on('hr');
            $table->foreign('faculty_id')->references('user_id')->on('faculty');

            $table->timestamps();

            //misc
            $table->primary(['hr_id','faculty_id']);
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
