<?php

use Illuminate\Database\Seeder;

class anggota extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Anggota::insert([
        [
          'nama_anggota'  => 'farras',
          'alamat' => 'halfway st. 199',
          'telp' => '013-44-666',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_anggota'  => 'snaff',
          'alamat' => 'sesame street 133',
          'telp' => '061-5519-338',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_anggota'  => 'freyr',
          'alamat' => 'saint dd 1050',
          'telp' => '615-001-912',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_anggota'  => 'putri',
          'alamat' => 'sesame street 172',
          'telp' => '061-5619-708',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'nama_anggota'  => 'sid',
          'alamat' => 'saint dd 1040',
          'telp' => '615-001-9552',
          'created_at' => date('Y-m-d H:i:s')
        ],
      ]);

    }
}
