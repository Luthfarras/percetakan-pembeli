<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Design extends Model
{
  protected $table="desain";
  protected $primaryKey="id";
  protected $fillable = [
    'gambar', 'harga_design'
  ];
}
