<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('kategori')->insert([
        'id_kategori' => 1,
        'nama_kategori' => 'Alat Tulis',
      ]);
      DB::table('kategori')->insert([
        'id_kategori' => 2,
        'nama_kategori' => 'Aksesoris',
      ]);
      DB::table('kategori')->insert([
        'id_kategori' => 3,
        'nama_kategori' => 'Perlengkapan',
      ]);
      DB::table('kategori')->insert([
        'id_kategori' => 4,
        'nama_kategori' => 'Pramuka',
      ]);
    }
}
