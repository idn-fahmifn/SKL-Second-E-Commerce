<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBarangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('barang', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_toko')->unsigned();
            $table->integer('id_kategori')->unsigned();
            $table->string('kode_barang');
            $table->string('nama_barang');
            $table->string('gambar');
            $table->string('harga');
            $table->text('deskripsi');
            $table->integer('stok');
            $table->string('warna')->nullable();
            $table->foreign('id_toko')->references('id')->on('toko')->onDelete('cascade')->onUpdate('cascade');
            $table->foreign('id_kategori')->references('id')->on('kategori')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('barang');
    }
}
