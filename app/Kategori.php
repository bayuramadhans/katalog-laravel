<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kategori extends Model
{
     use SoftDeletes;
    protected $table = 'kategori';

    protected $fillable = [
        'nama'
    ];
    public function IdKategoriProduk()
    {
        return $this->hasMany('App\Produk','id_kategori');
    }
}
