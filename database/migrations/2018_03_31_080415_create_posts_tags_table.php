<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsTagsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_tags', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->integer('tags_id')->unsigned();
            $table->foreign('tags_id')
                    ->references('id')->on('tags')
                    ->onDelete('cascade');
            $table->unique(['posts_id','tags_id']);         
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
        Schema::dropIfExists('posts_tags');
    }
}
