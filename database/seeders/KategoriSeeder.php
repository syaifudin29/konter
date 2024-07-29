<?php

namespace Database\Seeders;

use App\Models\KategoriModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class KategoriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        KategoriModel::create([
            'nama' => 'TRI',
            'keterangan' => 'Kartu Perdana',
        ]);
        KategoriModel::create([
            'nama' => 'XL',
            'keterangan' => 'Kartu Perdana',
        ]);
    }
}
