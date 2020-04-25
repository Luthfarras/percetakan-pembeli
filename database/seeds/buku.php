<?php

use Illuminate\Database\Seeder;

class buku extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      \App\Buku::insert([
        [
          'judul'  => 'nightshade',
          'penerbit' => 'gm did',
          'pengarang' => 'farras',
          'foto' => '-',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'judul'  => 'saint',
          'penerbit' => 's8n',
          'pengarang' => 'stn',
          'foto' => '-',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'judul'  => 'sinner',
          'penerbit' => '8gel',
          'pengarang' => 'angel',
          'foto' => '-',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'judul'  => 'fallen angel',
          'penerbit' => 'luci',
          'pengarang' => 'fer',
          'foto' => '-',
          'created_at' => date('Y-m-d H:i:s')
        ],
        [
          'judul'  => 'help',
          'penerbit' => 'dar!',
          'pengarang' => 'ziggy',
          'foto' => '-',
          'created_at' => date('Y-m-d H:i:s')
        ],
      ]);
    }
}
