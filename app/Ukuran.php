<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ukuran extends Model
{
  protected $table = 'ukuran';

  protected $fillable = [
      'nama'
  ];

  public function IdUkuranStok()
  {
      return $this->hasMany('App\Stok','id_ukuran');
  }
}
