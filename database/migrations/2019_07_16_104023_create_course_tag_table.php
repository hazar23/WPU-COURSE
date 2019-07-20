<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTagTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_tag', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned();
            $table->integer('tag_id')->unsigned();            
            
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('course_id')->references('id')->on('course')->onUpdate('cascade');
            $table->foreign('tag_id')->references('id')->on('tag')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course_tag');
    }
}
