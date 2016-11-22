<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCommentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('comment');
            $table->boolean('approved')->default(0);
            $table->integer('news_id')->unsigned();
            $table->integer('user_id')->unsigned();
            $table->integer('cnt_like');
            $table->integer('cnt_dislike');
            $table->timestamps();

            $table->foreign('news_id')->references('id')->on('news')->onDelete('cascade');;
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('comments');
    }
}
