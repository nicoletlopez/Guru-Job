<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDocumentSpaceTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('document_space', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            //enable for mysql
            //$table->string('desc');
            $table->text('desc');
            $table->integer('user_id')->unsigned();

            $table->foreign('user_id')->references('user_id')->on('faculty');
            $table->timestamps();

            //misc
            $table->index('id');
            $table->index(['title','desc']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('document_space');
    }
}
