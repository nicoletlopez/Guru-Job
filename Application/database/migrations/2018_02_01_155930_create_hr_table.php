<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHrTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr', function (Blueprint $table) {
            $table->integer('hr_id')->unsigned();
            $table->foreign('hr_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->double('balance')->default(2000.00);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hr');
    }
}
