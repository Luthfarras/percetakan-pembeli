<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\Detail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use JWTAuth;
use Auth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class TransController extends Controller
{
  public function store(Request $req){
      $validator = Validator::make($req->all(),
      [
        'id_customer' => 'required',
        'tgl_trans' => 'required',
        'metode_bayar' => 'required'
      ]);
      if($validator->fails()){
        return Response()->json($validator->errors());
      }
      $simpan = Transaksi::create([
        'id_customer' => $req->id_customer,
        'tgl_trans' => $req->tgl_trans,
        'metode_bayar' => $req->metode_bayar
      ]);
      $status=1;
      $message="Berhasil Membuat Pesanan";
      if($simpan){
        return Response()->json(compact('status','message'));
      } else {
        return Response()->json(['status' => 0]);
      }
    }

    public function detail(Request $req){
        $validator = Validator::make($req->all(),
        [
          'id_trans' => 'required',
          'id_barang' => 'required',
          'qty' => 'required'
        ]);
        if($validator->fails()){
          return Response()->json($validator->errors());
        }

        $harga=DB::table('barang')->where('id', $req->id_barang)->first();
        $subtotal = ($harga->harga_barang * $req->qty);

        $simpan = Detail::create([
          'id_trans' => $req->id_trans,
          'id_barang' => $req->id_barang,
          'subtotal' => $subtotal,
          'qty' => $req->qty
        ]);
        $status=1;
        $message="Berhasil Membuat Detail";
        if($simpan){
          return Response()->json(compact('status','message'));
        } else {
          return Response()->json(['status' => 0]);
        }
      }
}
