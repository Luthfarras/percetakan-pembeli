<?php

use Illuminate\Database\Seeder;

class petugas extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Petugas::insert([
        [
          'nama_petugas'  => 'luth',
          'alamat' => 'halfway st. 199',
          'telp' => '013-44-666',
          'username' => 'luthfa',
          'password' => '123456',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_petugas'  => 'farras',
          'alamat' => 'sesame street 133',
          'telp' => '061-5519-338',
          'username' => 'frs',
          'password' => '123456',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_petugas'  => 'tresanizega',
          'alamat' => 'saint dd 1050',
          'telp' => '615-001-912',
          'username' => 'trz',
          'password' => '123456',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_petugas'  => 'maranggra',
          'alamat' => 'sesame street 172',
          'telp' => '061-5619-708',
          'username' => 'mara',
          'password' => '123456',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_petugas'  => 'putri',
          'alamat' => 'saint dd 1040',
          'telp' => '615-001-9552',
          'username' => 'ptrtr',
          'password' => '123456',
          'created_at' => date('Y-m-d H:i:s')
        ],
      ]);
    }
}
