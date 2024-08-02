<?php

namespace Database\Seeders;

use App\Models\SaldoModel;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SaldoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        SaldoModel::create([
            'nama' => 'Dana',
            'saldo' => 5000,
            'aktif' => '1',
        ]);
        SaldoModel::create([
            'nama' => 'BCA',
            'saldo' => 9000,
            'aktif' => '1',
        ]);
    }
}
