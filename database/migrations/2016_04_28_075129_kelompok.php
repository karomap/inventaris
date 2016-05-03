<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Kelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kelompok', function (Blueprint $table) {
            $table->integer('id_bidang')->unsigned();
            $table->foreign('id_bidang')->references('id')->on('bidang')->onDelete('cascade');
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
        Schema::drop('kelompok');
    }
}
