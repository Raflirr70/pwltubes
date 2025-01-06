<?php
    use App\Models\Toko;
    use App\Models\BeliBarang;

    $toko = Toko::where('id', $idtoko)->first();
    
    $belibarangs = BeliBarang::where('id_gudang', $toko->id)->get();
    $totalbeli = 0;
    foreach ($belibarangs as $belibarang){
        $totalbeli += $belibarang->total_harga;
    }
    

    echo ( $toko->pendapatan - $toko->pengeluaran + 100000 - $totalbeli);
?>