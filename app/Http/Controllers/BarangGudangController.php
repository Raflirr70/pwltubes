<?php

namespace App\Http\Controllers;

use App\Models\BarangGudang;
use Illuminate\Http\Request;

class BarangGudangController extends Controller
{
    public function index(){
        $baranggudangs = BarangGudang::all();
        return view('baranggudang.index', compact('baranggudangs'));
    }
}
