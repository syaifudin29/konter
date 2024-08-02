<?php

namespace Database\Seeders;

use App\Models\PaymentModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        PaymentModel::create([
            'nama' => 'DANA',
            'keterangan' => 'E-Payment',
            'aktif' => '1',
        ]);
        PaymentModel::create([
            'nama' => 'MANDIRI',
            'keterangan' => 'BANK',
            'aktif' => '1',
        ]);
    }
}
