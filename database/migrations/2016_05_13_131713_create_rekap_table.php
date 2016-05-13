<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRekapTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rekap', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_bidang')->unsigned();
            $table->foreign('id_bidang')->references('id')->on('bidang')->onDelete('cascade');
            $table->integer('jumlah')->nullable();
            $table->bigInteger('harga')->nullable();
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
        Schema::drop('rekap');
    }
}
