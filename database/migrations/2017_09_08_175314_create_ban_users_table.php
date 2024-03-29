<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBanUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ban_users', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id')->unsigned();
            $table->integer('type_id')->unsigned();
            $table->dateTime('timestamp');
            $table->timestamps();
        });
        Schema::table('ban_users', function($table){
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreign('type_id')->references('id')->on('ban_types');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('ban_users');
    }
}
