<?php

namespace App\Http\Controllers;

use App\Models\ProdukModel;
use Illuminate\Http\Request;

class ProdukController extends Controller
{
    //
    public function produk(){
        
        $co = ProdukModel::select('*')->get();
        $data = ['produk' => $co];
        return view('produk/produk', $data);

    }
}
