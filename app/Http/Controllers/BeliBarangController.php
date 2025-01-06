<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BeliBarang;
use App\Models\Gudang;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeliBarangController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        
        if(Auth::user()->id == 1){
            $gudangs = Gudang::all();
            $belibarangs = BeliBarang::all();
        }else{
            $gudangs = Gudang::where('id', Auth::user()->id_toko)->get();
            $belibarangs = BeliBarang::where('id_gudang', Auth::user()->id_toko)->get();
            
        }

        return view('barang.logbelibarang', compact('belibarangs', 'gudangs', 'barangs'));
    }

    public function generatePDF()
    {
        $nama = Toko::where('id', Auth::user()->id_toko)->first()->name;
        $barangs = Barang::all();
        
        if(Auth::user()->id == 1){
            $gudangs = Gudang::all();
            $belibarangs = BeliBarang::all();
        }else{
            $gudangs = Gudang::where('id', Auth::user()->id_toko)->get();
            $belibarangs = BeliBarang::where('id_gudang', Auth::user()->id_toko)->get();
            
        }

        $pdf = Pdf::loadView('barang.logbelibarangpdf', compact('belibarangs', 'gudangs', 'barangs'));

        if(Auth::user()->id == 1){
            return $pdf->download('InformasiBeliBarang.pdf');
        }else{
            return $pdf->download('InformasiBeliBarang'.$nama.'.pdf');
        }
    }

}
