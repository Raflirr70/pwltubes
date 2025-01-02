<?php

namespace App\Http\Controllers;

use App\Models\JualBarang;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::where('id_user', Auth::id())->get();
        
        $jualbarangs = JualBarang::whereIn('id_transaksi', $transaksis->pluck('id'))->get();
        
        // Kirim data ke view
        return view('transaksi.index', compact('transaksis', 'jualbarangs'));
    }
    public function log()
    {
        $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)->where('status', 1)->get();
        
        $jualbarangs = JualBarang::whereIn('id_transaksi', $transaksis->pluck('id'))->get();
        
        return view('transaksi.logpesanan', compact('transaksis', 'jualbarangs'));
    }
    public function pesanan(){
        $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)->where('status', 0)->get();
        return view('transaksi.pesanan', compact('transaksis'));
    }
    public function terima(Request $request){
        $transaksis = Transaksi::where('id', $request->idtransaksi)->first();
        $transaksis->update([
            'status' => 1,
        ]);
        $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)
                           ->where('status', 0)
                           ->get();
        return view('transaksi.pesanan', compact('transaksis'));
    }
    public function delete(Request $request){
        $transaksis = Transaksi::where('id', $request->idtransaksi)->first();
        $transaksis->delete();

        $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)
                           ->where('status', 0)
                           ->get();
        return view('transaksi.pesanan', compact('transaksis'));
    }
}
