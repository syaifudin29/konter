<?php

namespace Database\Seeders;

use App\Models\TransaksiModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TransaksiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        TransaksiModel::create([
            'produk_id' => 1,
            'nama_produk' => 'Voucher Tri 2,5',
            'beli' => 500,
            'jual' => 1000,
            'payment' => 'DANA',
            'lunas' => 1,
            'aktif' => '1',
        ]);
        TransaksiModel::create([
            'produk_id' => 2,
            'nama_produk' => 'Voucher Tsel 2,5',
            'beli' => 500,
            'jual' => 1000,
            'payment' => 'BCA',
            'lunas' => 1,
            'aktif' => '1',
        ]);
    }
}
