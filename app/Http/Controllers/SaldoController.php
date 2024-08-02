<?php

namespace App\Http\Controllers;

use App\Models\JenisModel;
use App\Models\LabelModel;
use Illuminate\Http\Request;
use App\Models\KategoriModel;
use App\Models\SaldoModel;

class SaldoController extends Controller
{
    public function saldo(){
        $kategori = KategoriModel::where('aktif', '1')->get();
        $jenis = JenisModel::where('aktif', '1')->get();
        $label = LabelModel::where('aktif', '1')->get();
        $saldo = SaldoModel::where('aktif', '1')->get();

        $data = ['kategori' => $kategori, 'label' => $label, 'jenis' => $jenis, 'saldo' => $saldo];
        return view('saldo/saldo', $data);
    }
    public function updateSaldo(Request $req){
        if (isset($req->nama)) {
            SaldoModel::where('id', $req->id)->update(['nama' => $req->nama]);
        }else{
            SaldoModel::where('id', $req->id)->update(['saldo' => $req->saldo]);
        }
        return redirect()->back();
    }
    public function deleteSaldo($id){
        SaldoModel::where('id', $id)->update(['aktif' => '0']);
        return redirect()->back();
    }

    public function simpanSaldo(Request $req){
        SaldoModel::create(['nama' => $req->nama, 'saldo' =>0]);
        return redirect()->back();
    }
}
