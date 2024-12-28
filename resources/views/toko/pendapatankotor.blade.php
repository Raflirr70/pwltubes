<?php
    use App\Models\Gudang;

    $gudang = Gudang::where('id_toko', Auth::user()->toko->id)->first();
    

    echo ( Auth::user()->toko->pendapatan - $gudang->total_pengeluaran)
?>