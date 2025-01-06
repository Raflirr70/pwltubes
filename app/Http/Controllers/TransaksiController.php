<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangGudang;
use App\Models\JualBarang;
use App\Models\Toko;
use App\Models\Transaksi;
use Barryvdh\DomPDF\Facade\Pdf;
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
        if(Auth::user()->id == 1){
            $transaksis = Transaksi::where('status', 1)->get();
        }else{
            $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)->where('status', 1)->get();
        }
        $jualbarangs = JualBarang::whereIn('id_transaksi', $transaksis->pluck('id'))->get();
        $barangs = Barang::all();
        
        return view('transaksi.logpesanan', compact('transaksis', 'jualbarangs', 'barangs'));
    }

    public function generatePDF()
    {
        $nama = Toko::where('id', Auth::user()->id_toko)->first()->name;
        if(Auth::user()->id == 1){
            $transaksis = Transaksi::where('status', 1)->get();
        }else{
            $transaksis = Transaksi::where('id_toko', Auth::user()->id_toko)->where('status', 1)->get();
        }
        $jualbarangs = JualBarang::whereIn('id_transaksi', $transaksis->pluck('id'))->get();
        $barangs = Barang::all();
        $pdf = Pdf::loadView('transaksi.logpesananpdf', compact('transaksis', 'jualbarangs', 'barangs'));

        if(Auth::user()->id == 1){
            return $pdf->download('InformasiTransaksi.pdf');
        }else{
            return $pdf->download('InformasiTransaksi'.$nama.'.pdf');
        }
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

        $jualbarangs = JualBarang::where('id_transaksi', $transaksis->id)->get();
        foreach($jualbarangs as $jualbarang){
            $baranggudangs = BarangGudang::where('id_barang', $jualbarang->id_barang)->where('id_gudang', $transaksis->id_toko)->first();
            $baranggudangs->update([
                'jumlah_barang' => $baranggudangs->jumlah_barang - $jualbarang->jumlah_barang
            ]);
        }
        $tokos = Toko::where('id', $transaksis->id_toko)->first();
        $tokos->update([
            'pendapatan' => $tokos->pendapatan + $transaksis->total_harga
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
