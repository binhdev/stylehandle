<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOptionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('options', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('sites_id')->unsigned();
            $table->foreign('sites_id')
                    ->references('id')->on('sites')
                    ->onDelete('cascade');
            $table->string('title');
            $table->text('description');
            $table->string('site_logo')->nullable();
            $table->string('site_icon')->nullable();
            $table->string('copyright')->nullable();
            $table->string('domain_verify')->nullable();
            $table->string('domain_analytic')->nullable();
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
        Schema::dropIfExists('options');
    }
}
