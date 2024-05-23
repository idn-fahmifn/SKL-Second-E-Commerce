<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePembayaranTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pembayaran', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('id_keranjang')->unsigned();
            $table->string('kode_pembayaran');
            $table->text('alamat_pengiriman');
            $table->string('ekspedisi');
            $table->enum('status_pembayaran',['berhasil','gagal','dibatalkan'])->default('berhasil');
            $table->foreign('id_keranjang')->references('id')->on('keranjang')->onDelete('cascade')->onUpdate('cascade');
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
        Schema::dropIfExists('pembayaran');
    }
}
