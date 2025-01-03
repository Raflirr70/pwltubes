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

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|max:255',
            'harga_barang' => 'required|integer',
        ]);

        Barang::create($validated);

        $notification = array(
            'message' => 'Data barang berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('jumlah.create')->with($notification);
        } else {
            return redirect()->route('barang.create')->with($notification);
        }
    }

    public function indexbarang()
    {
        $barangs = Barang::all();
        $baranggudangs = BarangGudang::all();

        return view('barang.indexbarang', compact('barangs', 'baranggudangs'));
    }
}
