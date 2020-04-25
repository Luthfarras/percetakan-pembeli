<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Barang;
use App\Kategori;
use App\Design;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Auth;
use DB;
use Tymon\JWTAuth\Exceptions\JWTException;

class TampilController extends Controller
{
  public function barang(){
    $barang=Barang::get();
    $count=$barang->count();
    $arr_data=array();
    foreach ($barang as $b){
      $arr_data[]=array(
        'id' => $b->id,
        'id_kategori' => $b->id_kategori,
        'nama_barang' => $b->nama_barang,
        'bahan' => $b->bahan,
        'ukuran' => $b->ukuran,
        'harga_barang' => $b->harga_barang,
        'jumlah_produksi' => $b->jumlah_produksi,
        'deskripsi' => $b->deskripsi
      );
    }
    $status=1;
    return Response()->json(compact('status','count','arr_data'));
    }

    public function kategori(){
      $kategori=Kategori::get();
      $count=$kategori->count();
      $arr_data=array();
      foreach ($kategori as $k){
        $arr_data[]=array(
          'id' => $k->id,
          'kategori' => $k->kategori
        );
      }
      $status=1;
      return Response()->json(compact('status','count','arr_data'));
    }

    public function design(){
      $design=Design::get();
      $count=$design->count();
      $arr_data=array();
      foreach ($design as $d){
        $arr_data[]=array(
          'id' => $d->id,
          'gambar' => $d->gambar,
          'harga_design' => $d->harga_design
        );
      }
      $status=1;
      return Response()->json(compact('status','count','arr_data'));
    }

    public function report(){
      if(Auth::user()->level == 'pembeli'){
              $transaksi=DB::table('transaksi')
              ->join('customer', 'customer.id', '=', 'transaksi.id_customer')
              ->select('transaksi.id', 'tgl_trans', 'nama', 'metode_bayar')
              ->get();

              $datatrans=array(); $no=0;
              foreach ($transaksi as $tr) {
                $datatrans[$no]['id transaksi'] = $tr->id;
                $datatrans[$no]['tgl_trans'] = $tr->tgl_trans;
                $datatrans[$no]['nama pembeli'] = $tr->nama;
                $datatrans[$no]['metode_bayar'] = $tr->metode_bayar;

                $grand=DB::table('detail_trans')->groupBy('id_trans')
                ->select(DB::raw('sum(subtotal) as grand_total'))->first();

                $datatrans[$no]['grand_total'] = $grand->grand_total;
                $detail=DB::table('detail_trans')
                ->join('barang','barang.id', '=', 'detail_trans.id_barang')
                ->join('kategori','kategori.id', '=', 'barang.id_kategori')
                ->where('id_trans', $tr->id)
                ->select('nama_barang', 'kategori', 'ukuran', 'harga_barang', 'qty', 'subtotal')
                ->get();

                $datatrans[$no]['detail'] = $detail;
                $no++;
                }
              return response()->json(compact("datatrans"));
            } else{
              return response()->json(['status'=>'anda bukan user']);
            }
           }
    }
