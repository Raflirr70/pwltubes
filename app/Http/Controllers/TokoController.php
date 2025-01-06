<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangGudang;
use App\Models\Gudang;
use App\Models\Toko;
use Illuminate\Http\Request;

class TokoController extends Controller
{
    public function index(){
        $tokos = Toko::all();
        return view('toko.index', compact('tokos'));
    }

}
