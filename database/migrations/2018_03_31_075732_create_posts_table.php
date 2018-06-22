<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('author_id')->unsigned();
            $table->foreign('author_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->string('title')->unique();
            $table->string('slug')->unique();
            $table->string('thumbnail')->default('/no-image.png');
            $table->text('body');
            $table->enum('type',['post','page','attachment'])->default('post');
            $table->tinyInteger('active');
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
        Schema::dropIfExists('posts');
    }
}
