<?php
    use App\Models\Gudang;
    use App\Models\Barang;
    use App\Models\Toko;
    use App\Models\BarangGudang;
    use App\Models\BeliBarang;


    $gudang = Gudang::where('id_toko', $idtoko)->first();
    $baranggudangs = BarangGudang::where('id_gudang', $gudang->id)->get();  // Mendapatkan banyak barang
    $belibarangs = BeliBarang::where('id_gudang', $gudang->id)->get();

    $totalharusada = 0;
    foreach ($baranggudangs as $baranggudang) {
        $barangs = Barang::where('id', $baranggudang->id_barang)->first(); //mendaptakan barang 
        $totalharusada += $barangs->harga_barang * $baranggudang->jumlah_barang;
    }
    $tokos = Toko::where('id', $idtoko)->first();

    $totalbeli = 0;
    foreach ($belibarangs as $belibarang){
        $totalbeli += $belibarang->jumlah_barang * Barang::where('id', $belibarang->id_barang)->first()->harga_barang;
    }
    echo ($tokos->pendapatan + $totalharusada) - $tokos->pengeluaran - $totalbeli;
?>