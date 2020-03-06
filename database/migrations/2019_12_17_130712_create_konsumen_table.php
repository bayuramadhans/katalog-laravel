<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateKonsumenTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('konsumen', function (Blueprint $table) {
          $table->bigIncrements('id');
          $table->string('nama');
          $table->string('email');
          $table->string('alamat');
          $table->string('kota');
          $table->string('provinsi');
          $table->string('kode_pos');
          $table->string('no_telp');
          $table->dateTime('checkout_time')->nullable();
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
        Schema::dropIfExists('konsumen');
    }
}
