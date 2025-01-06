<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Barang;
use App\Models\Gudang;
use App\Models\BarangGudang;
use App\Models\BeliBarang;
use App\Models\Toko;
use Barryvdh\DomPDF\Facade\Pdf;
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

        $id = Barang::create($validated);
        $gudangs = Gudang::all(); $i=0;
        foreach($gudangs as $gudang){
            $i++;
            BarangGudang::create([
                'id_barang' => $id->id,
                'id_gudang' => $i,
                'jumlah_barang' => 0,
            ]);
        }
        $notification = array(
            'message' => 'Data barang berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('indexbarang')->with($notification);
        } else {
            return redirect()->route('barang.create')->with($notification);
        }
    }

    public function indexbarang()
    {
        if(auth::user()->id != 1){
            $gudangs = Gudang::where('id_toko', auth::user()->id_toko)->get();
            $baranggudangs = BarangGudang::where('id_gudang', $gudangs->pluck('id'))->get();
            $barangs = Barang::all();
        
        }else{
            $gudangs = Gudang::all();
            $baranggudangs = BarangGudang::all();
            $barangs = Barang::all();
        }
        
        return view('barang.indexbarang', compact('barangs', 'baranggudangs', 'gudangs'));
    }
    public function generatePDF()
    {
        $nama = Toko::where('id', Auth::user()->id_toko)->first()->name;
        if(auth::user()->id != 1){
            $gudangs = Gudang::where('id_toko', auth::user()->id_toko)->get();
            $baranggudangs = BarangGudang::where('id_gudang', $gudangs->pluck('id'))->get();
            $barangs = Barang::all();
        
        }else{
            $gudangs = Gudang::all();
            $baranggudangs = BarangGudang::all();
            $barangs = Barang::all();
        }
        $pdf = Pdf::loadView('barang.pdfbarang', compact('baranggudangs', 'gudangs', 'barangs'));

        if(Auth::user()->id == 1){
            return $pdf->download('InformasiBarang.pdf');
        }else{
            return $pdf->download('InformasiBarang'.$nama.'.pdf');
        }
    }
}
