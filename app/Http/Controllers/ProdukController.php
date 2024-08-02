<?php

namespace App\Http\Controllers;

use App\Models\JenisModel;
use App\Models\LabelModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class ProdukController extends Controller
{
    //
    public function produk($id){
        
        $produk = ProdukModel::select('*')->where('aktif', '1')->get();
        $kategori = KategoriModel::select('*')->where('aktif', '1')->get();
        $jenis = JenisModel::select('*')->where('aktif', '1')->get();
        $label = LabelModel::select('*')->where('aktif', '1')->get();

        $lbl = LabelModel::where('jenis_id', $id)->get();
        $jns = JenisModel::where('id', $id)->first();

        $data = ['kategori' => $kategori, 'label' => $label, 'jenis' => $jenis, 'produk' => $produk, 'lbl' => $lbl, 'jns' => $jns];
        return view('produk/produk', $data);

    }

    public function kategori($id){
        $kategori = KategoriModel::where('id', $id)->first();
        $jenis = JenisModel::where('aktif', '1')->where('kategori_id', $id)->get();
        $data = ['jenis' => $jenis, 'kategori' => $kategori, 'id' => $id];
        return view('produk/kategori', $data);
    }

    public function simpanProduk(Request $req){
        ProdukModel::create(['nama' => $req->nama, 
        'label_id' => $req->label_id, 
        'status' => $req->status, 
        'beli' => $req->beli,
        'jual' => $req->jual,
        'keterangan' => $req->keterangan,
        ]);
        return redirect()->back();
    }
    public function updateProduk(Request $req){
        ProdukModel::where('id', $req->id)->update(['nama' => $req->nama, 
        'label_id' => $req->label_id, 
        'status' => $req->status, 
        'beli' => $req->beli,
        'jual' => $req->jual,
        'keterangan' => $req->keterangan,
        ]);
        return redirect()->back();
    }

    public function deleteProduk($id){
        ProdukModel::where('id', $id)->update(['aktif' => '0']);
        return redirect()->back();
    }
}
