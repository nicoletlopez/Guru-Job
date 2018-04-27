<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSubjectRequiresSpecializationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subject_requires_specialization', function (Blueprint $table) {
            $table->integer('subject_id')->unsigned();
            $table->integer('specialization_id')->unsigned();

            $table->foreign('subject_id')->references('id')->on('subject');
            $table->foreign('specialization_id')->references('id')->on('specialization');

            $table->timestamps();
            //misc
            $table->primary(['subject_id','specialization_id']);
            $table->index(['subject_id','specialization_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('subject_requires_specialization');
    }
}
