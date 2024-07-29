<?php

namespace Database\Seeders;

use App\Models\LabelModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        LabelModel::create([
            'nama' => 'Jumbo',
            'keterangan' => 'Paket Jumbo',
            'kategori_id' => 1
        ]);
        LabelModel::create([
            'nama' => 'Mini',
            'keterangan' => 'Paket Mini',
            'kategori_id' => 2
        ]);
    }
}
