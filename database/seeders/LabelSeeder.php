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
            'jenis_id' => 1,
            'aktif' => '1',
        ]);
        LabelModel::create([
            'nama' => 'Mini',
            'keterangan' => 'Paket Mini',
            'jenis_id' => 2,
            'aktif' => '1',
        ]);
    }
}
