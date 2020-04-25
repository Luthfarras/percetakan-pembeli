<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Detail extends Model
{
  protected $table="detail_trans";
  protected $primaryKey="id";
  protected $fillable = [
    'id_trans', 'id_barang', 'subtotal', 'qty'
  ];
}
