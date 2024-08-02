<?php

namespace Database\Seeders;

use App\Models\JenisModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        JenisModel::create([
            'nama' => 'TRI',
            'keterangan' => 'kartu',
            'aktif' => '1',
            'kategori_id' => '1',
        ]);
        JenisModel::create([
            'nama' => 'TELKOMSEL',
            'keterangan' => 'Kartu',
            'aktif' => '1',
            'kategori_id' => '1',
        ]);
    }
}
