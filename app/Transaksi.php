<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Transaksi extends Model
{
  protected $table="transaksi";
  protected $primaryKey="id";
  protected $fillable = [
    'id_customer', 'tgl_trans', 'metode_bayar'
  ];
}
