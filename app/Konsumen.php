<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Konsumen extends Model
{
  protected $table = 'konsumen';

  protected $fillable = [
      'nama','email','alamat','kota','provinsi','kode_pos', 'no_telp', 'checkout_time'
  ];

  public function IdKonsumenIsiKeranjang()
  {
      return $this->hasMany('App\IsiKeranjang','id_konsumen');
  }
}
