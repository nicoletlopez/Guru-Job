<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFacultyHasDocumentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hr_has_document', function (Blueprint $table) {
            $table->integer('document_id')->unsigned();
            $table->integer('user_id')->unsigned();

            $table->foreign('document_id')->references('id')->on('document');
            $table->foreign('user_id')->references('user_id')->on('hr');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('faculty_has_document');
    }
}
