<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');            
            $table->string('name',100);
            $table->string('image',50);
            $table->string('email',100)->unique();
            $table->string('password',500);
            $table->string('location',200)->nullable();
            $table->string('gender',1)->nullable();
            $table->string('contact',15)->nullable();
            $table->timestamp('email_verified_at')->nullable();            
            $table->timestamps();
            $table->softDeletes();
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('users');
    }
}
