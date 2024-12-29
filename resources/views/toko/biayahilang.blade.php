<?php
    use App\Models\Gudang;
    use App\Models\Barang;
    use App\Models\BarangGudang;

    $gudang = Gudang::where('id_toko', Auth::user()->toko->id)->first();
    $baranggudangs = BarangGudang::where('id_gudang', $gudang->id)->get();  // Mendapatkan banyak barang

    $totalharusada = 0;
    foreach ($baranggudangs as $baranggudang) {
        $barangs = Barang::where('id', $baranggudang->id_barang)->first(); //mendaptakan barang 
        $totalharusada += $barangs->harga_barang;
    }
    echo $gudang->total_harga - $totalharusada;
?>