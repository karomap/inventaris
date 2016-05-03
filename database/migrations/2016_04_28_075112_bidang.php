<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Bidang extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bidang', function (Blueprint $table) {
            $table->integer('id_gol')->unsigned();
            $table->foreign('id_gol')->references('id')->on('golongan')->onDelete('cascade');
            $table->string('bidang');
            $table->integer('id')->unsigned()->primary();
            $table->string('uraian');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('bidang');
    }
}
