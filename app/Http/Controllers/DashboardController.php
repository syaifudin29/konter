<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\TransaksiModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    //
    public function index(){
        
        $tanggal = date('y-m-d');
        $jumlah_harian = 0;
        $transaksi_harian = TransaksiModel::where('created_at', '>=', Carbon::today());
        $jml_transaksi_harian = $transaksi_harian->count();
        foreach ($transaksi_harian->get() as $key) {
            $jumlah_harian = ($key->jual - $key->beli)+$jumlah_harian;
        }

        $jumlah_bulanan = 0;
        $transaksi_bulanan = TransaksiModel::where('created_at', '>=', Carbon::now()->format('m'));
        $jml_transaksi_bulanan = $transaksi_bulanan->count();
        foreach ($transaksi_bulanan->get() as $key) {
            $jumlah_bulanan = ($key->jual - $key->beli)+$jumlah_bulanan;
        }


        $data = ['jml_transaksi_harian' => $jml_transaksi_harian , 'jumlah_harian' => $jumlah_harian, 'jml_transaksi_bulanan' => $jml_transaksi_bulanan , 'jumlah_bulanan' => $jumlah_bulanan];
        return view('dashboard/index', $data);        
    }

    public function login(){
        return view('login');
    } 
    public function loginCek(Request $req){
      
        // $cek = User::where('email', $req->post('email'))->first();
        // $chek =  Hash::check($req->post('password'), $cek->password );
        // if($chek){
        //     return redirect()->route('dashboard');
        // }else{
        //     return redirect()->route('login');
        // }
        $credentials = $req->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        if (Auth::attempt($credentials)) {
            $req->session()->regenerate();
            return redirect()->intended('dashboard');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    } 
    public function logout(Request $req){
        Auth::logout();
        return to_route('login');
    }

}
