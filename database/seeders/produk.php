<?php

namespace Database\Seeders;

use App\Models\ProdukModel;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class produk extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        ProdukModel::create([
            'nama' => '4',
            'label_id' => 1,
            'status'=> 'aktif',
            'jual' => '1000',
            'beli' => '2000',
            'keterangan' => 'oke',
            'aktif' => '1',
        ]);
        ProdukModel::create([
            'nama' => '2,5',
            'label_id' => 2,
            'status'=> 'gangguan',
            'jual' => '1000',
            'beli' => '2000',
            'keterangan' => 'oke',
            'aktif' => '1',
        ]);
    }
}
