<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangGudang;
use App\Models\Gudang;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TokoController extends Controller
{
    public function index(){
        $tokos = Toko::all();
        return view('toko.index', compact('tokos'));
    }
    public function generatePDF()
    {
        $nama = Toko::where('id', Auth::user()->id_toko)->first()->name;
        $tokos = Toko::all();
        $pdf = Pdf::loadView('toko.pdftoko', compact('tokos'));

        if(Auth::user()->id == 1){
            return $pdf->download('InformasiToko.pdf');
        }else{
            return $pdf->download('InformasiToko'.$nama.'.pdf');
        }
    }
}
