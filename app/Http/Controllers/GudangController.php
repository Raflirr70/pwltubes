<?php

namespace App\Http\Controllers;

use App\Models\Gudang;
use App\Models\Toko;
use Illuminate\Http\Request;

class GudangController extends Controller
{
    public function index(){
        $gudangs = Gudang::all();
        return view('gudang.index', compact('gudangs'));
    }
}
