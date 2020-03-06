<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FotoProduk extends Model
{
  protected $table = 'foto_produk';

  protected $fillable = [
      'id_produk','file_name','file_url','mime_type'
  ];

  public function IdProdukFotoProduk()
  {
      return $this->belongsTo('App\Produk','id_produk');
  }
}
