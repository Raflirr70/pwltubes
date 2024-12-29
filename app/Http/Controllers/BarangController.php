<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\BarangGudang;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index(){
        $barangs = Barang::all();
        return view('belanja', compact('barangs'));
    }

    public function indexbarang()
    {
        $barangs = Barang::all();
        $baranggudangs = BarangGudang::all();

        return view('barang.indexbarang', compact('barangs', 'baranggudangs'));
    }
}
