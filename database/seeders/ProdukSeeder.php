<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('produk')->insert([
        'id_produk' => 1,
        'id_kategori' => 1,
        'kode_produk' => 'P0001',
        'id_warung' => 1,
        'nama_produk' => 'Buku',
        'merk' => 'Sidu',
        'harga_beli' => 2000,
        'diskon' => 0,
        'harga_jual' => 2500,
        'stok' => 10,
      ]);
      DB::table('produk')->insert([
        'id_produk' => 2,
        'id_kategori' => 2,
        'kode_produk' => 'P0002',
        'id_warung' => 2,
        'nama_produk' => 'Dasi',
        'merk' => 'Mbuh',
        'harga_beli' => 5000,
        'diskon' => 0,
        'harga_jual' => 6500,
        'stok' => 10,
      ]);
      DB::table('produk')->insert([
        'id_produk' => 3,
        'id_kategori' => 3,
        'kode_produk' => 'P0003',
        'id_warung' => 3,
        'nama_produk' => 'Tas',
        'merk' => 'Nike',
        'harga_beli' => 3000,
        'diskon' => 0,
        'harga_jual' => 3500,
        'stok' => 10,
      ]);
    }
}
