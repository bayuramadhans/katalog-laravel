<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stok extends Model
{
  protected $table = 'stok';

  protected $fillable = [
      'id_produk','id_ukuran','id_warna','stok'
  ];

  public function IdProdukStok()
  {
      return $this->belongsTo('App\Produk','id_produk');
  }
  public function IdUkuranStok()
  {
      return $this->belongsTo('App\Ukuran','id_ukuran');
  }
  public function IdWarnaStok()
  {
      return $this->belongsTo('App\Warna','id_warna');
  }
  public function IdStokIsiKeranjang()
  {
      return $this->hasMany('App\IsiKeranjang','id_stok');
  }
}
