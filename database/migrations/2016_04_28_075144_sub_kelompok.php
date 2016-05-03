<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SubKelompok extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sub_kelompok', function (Blueprint $table) {
            $table->integer('id_kelompok')->unsigned();
            $table->foreign('id_kelompok')->references('id')->on('kelompok')->onDelete('cascade');
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
        Schema::drop('sub_kelompok');
    }
}
