<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Item extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('id_kategori')->unsigned();
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade');
            $table->integer('register')->unsigned();
            $table->foreign('register')->references('id')->on('users')->onDelete('cascade');
            $table->string('merk_type');
            $table->string('no_spcm');
            $table->string('bahan');
            $table->enum('asal', ['hibah', 'pembelian']);
            $table->integer('tahun');
            $table->string('ukuran_konstruksi')->nullable();
            $table->string('satuan')->nullable();
            $table->enum('keadaan', ['b', 'kb', 'rb']);
            $table->integer('jumlah');
            $table->bigInteger('harga');
            $table->text('keterangan')->nullable();
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
        Schema::drop('item');
    }
}
