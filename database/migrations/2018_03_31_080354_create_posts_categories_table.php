<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostsCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_categories', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->integer('categories_id')->unsigned();
            $table->foreign('categories_id')
                    ->references('id')->on('categories')
                    ->onDelete('cascade');
            $table->unique(['posts_id','categories_id']);         
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
        Schema::dropIfExists('posts_categories');
    }
}
