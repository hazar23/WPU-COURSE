<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('subject_id')->unsigned()->nullable();
            $table->integer('path_id')->unsigned()->nullable();
            $table->integer('level_id')->unsigned();
            $table->string('title',100);
            $table->string('slug',150)->nullable();
            $table->text('description')->nullable();            
            $table->string('image',50)->nullable();            
            $table->tinyInteger('published')->nullable()->default(0);
                
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('subject_id')->references('id')->on('subject')->onUpdate('cascade');
            $table->foreign('path_id')->references('id')->on('path')->onUpdate('cascade');
            $table->foreign('level_id')->references('id')->on('level')->onUpdate('cascade');
            $table->index(['deleted_at']);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('course');
    }
}
