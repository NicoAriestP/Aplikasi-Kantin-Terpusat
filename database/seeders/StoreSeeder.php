<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StoreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stores')->insert([
            'id' => 1,
            'nama_warung' => 'Warung Mas Tis',
        ]);
        DB::table('stores')->insert([
            'id' => 2,
            'nama_warung' => 'Warung Mas Candra',
        ]);
        DB::table('stores')->insert([
            'id' => 3,
            'nama_warung' => 'Warung Mbak Sus',
        ]);
        DB::table('stores')->insert([
            'id' => 4,
            'nama_warung' => 'Kantin 3B',
        ]);
        DB::table('stores')->insert([
            'id' => 5,
            'nama_warung' => 'Warung Pak Puji',
        ]);
        DB::table('stores')->insert([
            'id' => 6,
            'nama_warung' => 'Warung Cak Ri',
        ]);
        DB::table('stores')->insert([
            'id' => 7,
            'nama_warung' => 'Warung Mbak Ika',
        ]);
    }
}
