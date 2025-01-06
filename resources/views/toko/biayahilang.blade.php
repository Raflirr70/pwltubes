<?php
    use App\Models\Gudang;
    use App\Models\Barang;
    use App\Models\Toko;
    use App\Models\BarangGudang;


    $gudang = Gudang::where('id_toko', $idtoko)->first();
    $baranggudangs = BarangGudang::where('id_gudang', $gudang->id)->get();  // Mendapatkan banyak barang

    $totalharusada = 0;
    foreach ($baranggudangs as $baranggudang) {
        $barangs = Barang::where('id', $baranggudang->id_barang)->first(); //mendaptakan barang 
        $totalharusada += $barangs->harga_barang * $baranggudang->jumlah_barang;
    }
    $tokos = Toko::where('id', $idtoko)->first();

    echo ($tokos->pendapatan + $totalharusada) - $tokos->pengeluaran;
?>