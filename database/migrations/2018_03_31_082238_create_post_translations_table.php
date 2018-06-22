<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePostTranslationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts_translations', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->string('tttitle');
            $table->text('tbody');
            $table->string('locale')->index();
            $table->unique(['posts_id','locale']);
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
        Schema::dropIfExists('posts_translations');
    }
}
