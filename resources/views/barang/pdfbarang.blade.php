<div>
    <div>
        <div>
            <div>
                @foreach ($gudangs as $gudang)
                    @php
                        $nametoko = Auth::user()->toko->firstWhere('id', $gudang->id_toko);
                    @endphp

                    <h1>Daftar Barang</h1>
                    <h1>{{$nametoko->name}}</h1>

                    <table border="1">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Jumlah Stok</th>
                                <th>Harga</th>
                                <th>Total Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalharga=0 @endphp
                            @foreach ($barangs as $barang)
                                @php
                                    $jumlah_stock = $baranggudangs->where('id_barang', $barang->id)->where('id_gudang', $gudang->id)->first()->jumlah_barang;
                                    $subtotal = $barang->harga_barang * $baranggudangs->where('id_barang', $barang->id)->where('id_gudang', $gudang->id)->first()->jumlah_barang;
                                    $totalharga += $subtotal;
                                @endphp
                                <tr>
                                    <td>{{ $barang->id }}</td>
                                    <td>{{ $barang->name }}</td>
                                    <td>{{ $jumlah_stock }} unit</td>
                                    <td>{{ $barang->harga_barang }} $</td>
                                    <td>{{ $subtotal }}.00 $</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="4" class="text-center">Total</td>
                                <td class="text-right">{{ $totalharga }}.00 $</td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
            </div>
        </div>
    </div>
</div>
