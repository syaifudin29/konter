<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    //
    public function transaksi(){
        $produk = ProdukModel::select('*')->where('aktif', '1')->get();
        $transaksi = TransaksiModel::select('*')->where('aktif', '1')->get();
        $data = ['transaksi' => $transaksi, 'produk' => $produk];
        return view('transaksi/transaksi', $data);
    }
}
