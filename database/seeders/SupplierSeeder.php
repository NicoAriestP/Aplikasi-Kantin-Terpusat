<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      DB::table('supplier')->insert([
        'id_supplier' => 1,
        'nama' => 'Pasar Tobo',
        'alamat' => 'Mboti',
        'telepon' => '08381209123',
      ]);
      DB::table('supplier')->insert([
        'id_supplier' => 2,
        'nama' => 'Pasar Padangan',
        'alamat' => 'Mboti',
        'telepon' => '08381309123',
      ]);
      DB::table('supplier')->insert([
        'id_supplier' => 3,
        'nama' => 'Pasar Ngraho',
        'alamat' => 'Mboti',
        'telepon' => '08381209123',
      ]);
    }
}
