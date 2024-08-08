<?php

namespace App\Http\Controllers;

use App\Models\SaldoModel;
use App\Models\ProdukModel;
use App\Models\PaymentModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\TransaksiModel;

class TransaksiController extends Controller
{
    //
    public function transaksi(){
        $produk = ProdukModel::select('*')->where('aktif', '1')->get();
        $transaksi = TransaksiModel::select('*')->where('aktif', '1')->orderBy('id', 'DESC')->get();
        $payment = PaymentModel::select('*')->where('aktif', '1')->get();
        $users = ProdukModel::select('*')->where('aktif', '1')->get()->toJson();
    //  print_r($users);
    //     exit();
        $data = ['transaksi' => $transaksi, 'produk' => $produk,'produk_js' => $users, 'payment' => $payment];
        return view('transaksi/transaksi', $data);
    }
    public function proses(){
        $produk = ProdukModel::select('*')->where('aktif', '1')->get();
        $transaksi = TransaksiModel::select('*')->where('aktif', '1')->get();
        $payment = SaldoModel::select('*')->where('aktif', '1')->get();
        $users = ProdukModel::select('*')->where('aktif', '1')->get()->toJson();
    //  print_r($users);
    //     exit();
        $data = ['transaksi' => $transaksi, 'produk' => $produk,'produk_js' => $users, 'payment' => $payment];
        return view('transaksi/proses_transaksi', $data);
    }
    public function simpan(Request $req){

        $produk = ProdukModel::select('*')->where('id', $req->post('id_produk'))->first();    
      
        $nama = $produk->label->jenis->kategori->nama." ".$produk->label->jenis->nama." ".$produk->nama;
    
        if (isset($_POST['harga_jual'])) {
            $harga_jual = $req->post('harga_jual');
        }else{
            $harga_jual = $produk->jual;
        }

        if (isset($_POST['harga_beli'])) {
            $harga_beli = $req->post('harga_beli');
        }else{
            $harga_beli = $produk->beli;
        }
        
        $data = ['produk_id' => $req->post('id_produk'), 
        'nama_produk' =>  $nama, 
        'beli' =>  $harga_beli,
        'jual' =>  $harga_jual,
        'payment_id' => $req->post('payment'),
        'keterangan' =>  $req->post('keterangan'),
        'deskripsi' =>  $req->post('deskripsi'),
        'lunas' => $req->post('lunas')];
        TransaksiModel::create($data);
        return redirect()->route('transaksi');
    }

    public function deleteTransaksi($id){
        TransaksiModel::where('id', $id)->delete();
        return redirect()->route('transaksi');
    }
}
