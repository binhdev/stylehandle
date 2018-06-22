<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seos', function (Blueprint $table) {
          $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->string('title');
            $table->string('description');
            $table->string('share_image')->nullable();
            $table->string('share_url')->nullable();
            $table->string('views')->nullable();
            $table->string('likes')->nullable();
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
        Schema::dropIfExists('seos');
    }
}
