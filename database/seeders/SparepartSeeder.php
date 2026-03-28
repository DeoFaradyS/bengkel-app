<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SparepartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('spareparts')->insert([
        [
            'nama' => 'Oli Mesin',
            'stok' => 20,
            'harga' => 75000,
        ],
        [
            'nama' => 'Kampas Rem',
            'stok' => 15,
            'harga' => 45000,
        ],
        [
            'nama' => 'Busi Motor',
            'stok' => 30,
            'harga' => 25000,
        ],
        [
            'nama' => 'Filter Udara',
            'stok' => 12,
            'harga' => 60000,
        ],
    ]);
    }
}
