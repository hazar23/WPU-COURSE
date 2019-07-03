<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLessonTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('lesson', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('course_id')->unsigned()->nullable();            
            $table->string('title')->nullable();
            $table->string('slug')->nullable();                        
            $table->string('video_link')->nullable();                        
            $table->text('content')->nullable();
            $table->integer('position')->nullable()->unsigned();
            $table->string('file')->nullable();                                    
            $table->tinyInteger('published')->nullable()->default(0);
                
           $table->timestamps();
           $table->softDeletes();

        //    relasi
        $table->foreign('course_id')
            ->references('id')
            ->on('course')
            ->onUpdate('cascade');        
           

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
        Schema::dropIfExists('lesson');
    }
}
