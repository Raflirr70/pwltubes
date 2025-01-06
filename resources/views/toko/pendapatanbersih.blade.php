<?php
    use App\Models\Toko;

    $toko = Toko::where('id', $idtoko)->first();

    echo ( $toko->pendapatan - $toko->pengeluaran + 100000)
?>