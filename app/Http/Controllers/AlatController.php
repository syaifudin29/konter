<?php

namespace App\Http\Controllers;

use App\Models\JenisModel;
use App\Models\LabelModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;

class AlatController extends Controller
{
    //
    public function alat(){
        
        $kategori = KategoriModel::select('*')->where('aktif', '1')->get();
        $jenis = JenisModel::select('*')->where('aktif', '1')->get();
        $label = LabelModel::select('*')->where('aktif', '1')->get();
        $data = ['kategori' => $kategori, 'label' => $label, 'jenis' => $jenis];
        return view('alat/alat', $data);
    }

    // kategori
    public function deleteKategori($id){
        KategoriModel::where('id', $id)->update(['aktif' => '0']);
        return redirect()->route('alat');
    }
    public function simpanKategori(Request $req){
        KategoriModel::create(['nama' => $req->nama, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }
    public function updateKategori(Request $req){
        KategoriModel::where('id', $req->id)->update(['nama' => $req->nama, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }
    
    // label
    public function deleteLabel($id){
        LabelModel::where('id', $id)->update(['aktif' => '0']);
        return redirect()->route('alat');
    }
    public function simpanLabel(Request $req){
        LabelModel::create(['nama' => $req->nama, 'jenis_id' => $req->jenis_id, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }
    public function updateLabel(Request $req){
        LabelModel::where('id', $req->id)->update(['nama' => $req->nama, 'jenis_id' => $req->jenis_id, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }

    // Jenis
    public function deleteJenis($id){
        JenisModel::where('id', $id)->update(['aktif' => '0']);
        return redirect()->route('alat');
    }
    public function simpanJenis(Request $req){
        JenisModel::create(['nama' => $req->nama, 'kategori_id' => $req->kategori_id, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }
    public function updateJenis(Request $req){
        JenisModel::where('id', $req->id)->update(['nama' => $req->nama, 'kategori_id' => $req->kategori_id, 'keterangan' => $req->keterangan]);
        return redirect()->route('alat');
    }
}
