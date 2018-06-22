<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableShareds extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shareds', function (Blueprint $table) {
           $table->engine = "InnoDB";
            $table->increments('id');
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                ->references('id')->on('users')
                ->onDelete('cascade');
            $table->integer('posts_id')->unsigned();
            $table->foreign('posts_id')
                    ->references('id')->on('posts')
                    ->onDelete('cascade');
            $table->string('reffer',45);
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
        Schema::dropIfExists('shareds');
    }
}
