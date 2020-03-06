<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class IsiKeranjang extends Model
{
  protected $table = 'isi_keranjang';

  protected $fillable = [
      'id_konsumen', 'id_stok', 'jumlah', 'total_harga'
  ];

  public function IdKonsumenIsiKeranjang()
  {
      return $this->belongsTo('App\Konsumen','id_konsumen');
  }
  public function IdStokIsiKeranjang()
  {
      return $this->belongsTo('App\Stok','id_stok');
  }
}
