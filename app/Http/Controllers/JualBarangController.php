<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\BeliBarang;
use App\Models\JualBarang;
use App\Models\Transaksi;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class JualBarangController extends Controller
{
    public function store(Request $request)
    {
        $transaksi = Transaksi::create([
            'id_toko'=> $request->idtoko,
            'id_user'=> $request->iduser,
            'total_barang'=> 0,
            'total_harga'=> 0,
            
        ]);

        $total_barang = 0;
        $total_harga = 0;

        for ($i = 1; $i <= $request->i; $i++) {
            $quantity = "quantity" . $i;
            $qty = $request->input($quantity);
            echo $qty;
            if ($qty > 0) {
                $jualbarang = JualBarang::create([
                    'id_transaksi' => $transaksi->id, // ID transaksi yang baru
                    'id_barang' => $request->input('idbarang' . $i),
                    'jumlah_barang' => $qty,
                    'total_harga' => $request->input('hargabarang' . $i) * $qty,
                ]);
                $total_barang += $qty;
                $total_harga += $request->input('hargabarang' . $i) * $qty;

                $idgudang = $request->idtoko;
                BeliBarang::create([
                    'id_gudang' => $idgudang,
                    'id_barang' => $request->input('idbarang' . $i),
                    'jumlah_barang' => $qty,
                    'total_harga' => $request->input('hargabarang' . $i) * $qty,
                ]);
            }
        }
        $transaksi->update([
            'total_barang' => $total_barang,
            'total_harga' => $total_harga,
        ]);

        return redirect()->route('belanja')->with('success', 'Transaksi berhasil disimpan.');
    }
}
