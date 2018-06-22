<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenulinksTable extends Migration
{

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('menulinks', function (Blueprint $table) {
            $table->engine='InnoDB';
            $table->increments('id');
            $table->integer('menus_id')->unsigned();
            $table->foreign('menus_id')
                    ->references('id')->on('menus')
                    ->onDelete('cascade');
            $table->string('name');
            $table->string('url')->nullable();
            $table->tinyInteger('sort')->default(0);
            $table->integer('parent_id')->default(0);
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
        Schema::dropIfExists('menulinks');
    }
}
