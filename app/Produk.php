<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Produk extends Model
{
  use SoftDeletes;
  protected $table = 'produk';

  protected $fillable = [
      'id_kategori','nama','deskripsi','harga','harga_diskon','status_diskon','status_jual'
  ];

  public function IdKategoriProduk()
  {
      return $this->belongsTo('App\Kategori','id_kategori');
  }
  public function IdProdukStok()
  {
      return $this->hasMany('App\Stok','id_produk');
  }
  public function IdProdukFotoProduk()
  {
      return $this->hasMany('App\FotoProduk','id_produk');
  }
}
