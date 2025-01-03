<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BarangGudang;
use App\Models\Gudang;
use Illuminate\Http\Request;

class BarangGudangController extends Controller
{
    public function index(){
        $baranggudangs = BarangGudang::all();
        return view('baranggudang.index', compact('baranggudangs'));
    }

    public function create()
    {
        $data = [
            'barangs' => Barang::pluck('name', 'id'),
            'gudangs' => Gudang::pluck('id', 'id_toko')
        ];
        return view('jumlah.create', $data);
    }

    public function store(Request $request)
    {
        // dd($request->all());

        $validated = $request->validate([
            'id_barang' => 'required',
            'id_gudang' => 'required',
            'jumlah_barang' => 'required'
        ]);

        BarangGudang::create($validated);

        $notification = array(
            'message' => 'Data barang berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('indexbarang')->with($notification);
        } else {
            return redirect()->route('jumlah.create')->with($notification);
        }
    }

    public function indexbarang()
    {
        $baranggudangs = BarangGudang::all();
        return view('barang.indexbarang', compact('baranggudangs'));
    }

}
