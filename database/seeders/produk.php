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
            'kategori' => '1',
            'label' => '1',
            'jenis'=> '1',
            'status'=> 'aktif',
            'jual' => '1234',
            'beli' => '25423',
            'keterangan' => 'oke'
        ]);
        ProdukModel::create([
            'nama' => '2,5',
            'kategori' => '2',
            'label' => '2',
            'jenis'=> '2',
            'status'=> 'gangguan',
            'jual' => '1234',
            'beli' => '25423',
            'keterangan' => 'oke'
        ]);
    }
}
