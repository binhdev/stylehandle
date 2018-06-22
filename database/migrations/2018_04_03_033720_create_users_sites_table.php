<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersSitesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users_posts', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->integer('users_id')->unsigned();
            $table->foreign('users_id')
                    ->references('id')->on('users')
                    ->onDelete('cascade');
            $table->integer('sites_id')->unsigned();
            $table->foreign('sites_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');
            $table->unique(['users_id','sites_id']);
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
        Schema::dropIfExists('users_posts');
    }
}
