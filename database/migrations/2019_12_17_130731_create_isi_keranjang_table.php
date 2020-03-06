<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIsiKeranjangTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('isi_keranjang', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->integer('id_konsumen')->unsigned();
          $table->integer('id_stok')->unsigned();
          $table->integer('jumlah');
          $table->integer('total_harga');
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
        Schema::dropIfExists('isi_keranjang');
    }
}
