<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                ->references('id')->on('posts')
                ->onDelete('cascade');
            $table->enum('type', ['youtube', 'photogoole', 'vimeo','facebook','client'])->default('youtube');
            $table->tinyInteger('episode')->nullable();
            $table->tinyInteger('status');
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
        Schema::dropIfExists('links');
    }
}
