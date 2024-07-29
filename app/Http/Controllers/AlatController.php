<?php

namespace App\Http\Controllers;

use App\Models\KategoriModel;
use App\Models\ProdukModel;
use Illuminate\Http\Request;

class AlatController extends Controller
{
    //
    public function alat(){
        
        $kategori = KategoriModel::select('*')->get();
        $data = ['kategori' => $kategori];
        return view('alat/alat', $data);
    }

    // kategori

    public function deleteKategori($id){
        KategoriModel::where('id', $id)->delete();
        return redirect()->route('alat');
    }
}
