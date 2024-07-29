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
            'nama' => 'Vocher',
            'keterangan' => 'Vocher',
        ]);
        JenisModel::create([
            'nama' => 'Kartu Perdana',
            'keterangan' => 'Kartu',
        ]);
    }
}
