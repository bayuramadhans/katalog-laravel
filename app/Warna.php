<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warna extends Model
{
  protected $table = 'warna';

  protected $fillable = [
      'nama','hex'
  ];

  public function IdWarnaStok()
  {
      return $this->hasMany('App\Stok','id_warna');
  }
}
