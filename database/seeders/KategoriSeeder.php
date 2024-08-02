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
            'nama' => 'Kartu Perdana',
            'keterangan' => 'Kartu Perdana',
            'aktif' => '1',
        ]);
        KategoriModel::create([
            'nama' => 'Voucher',
            'keterangan' => 'Voucher',
            'aktif' => '1',
        ]);
    }
}
