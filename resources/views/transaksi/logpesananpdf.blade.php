@php
    use App\Models\Toko;
@endphp
<div>
    <div>
        <div>
            <div>
                @php $ii = 0; @endphp
                @if(Auth::user()->id == 1)
                    <h2> Riwayat Transaksi</h2>
                @else
                    <h2> Riwayat Transaksi {{Toko::where('id', Auth::user()->id_toko)->first()->name}}</h2>
                @endif
                <table border="1">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Transaksi</th>
                            <th>Nama Cabang</th>
                            <th>Nama Pembeli</th>
                            <th>Nama Kasir</th>
                            <th>Jumlah Barang</th>
                            <th>Datar Barang</th>
                            <th>Total Harga</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    @foreach ($transaksis as $transaksi)
                        <tbody>
                            @php $ii++; @endphp
                            <tr>
                                <td>{{ $ii }}</td>
                                <td>{{ $transaksi->id }}</td>
                                <td>{{ Toko::where('id', $transaksi->id_toko)->first()->name }}</td>
                                <td>{{ $transaksi->user->firstname. ' ' .$transaksi->user->lastname}}</td>
                                <td>{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</td>
                                <td>{{ $transaksi->total_barang }}</td>
                                <td>
                                    <table border="1">
                                        <thead>
                                            <tr>
                                                <th>No</th>
                                                <th>name</th>
                                                <th>Harga Barang</th>
                                                <th>Jumlah Unit</th>
                                                <th>Total</th>
                                            </tr>
                                        </thead>
                                        @php $i = 0; @endphp
                                        <tbody>
                                            @foreach ($jualbarangs as $jualbarang)
                                                @if ($jualbarang->id_transaksi == $transaksi->id)
                                                    @php $i++; @endphp
                                                    <tr>
                                                        <td>{{ $i }}</td>
                                                        <td>{{ $barangs->get($jualbarang->id_barang - 1)->name }}</td>
                                                        <td>{{ $barangs->get($jualbarang->id_barang - 1)->harga_barang }}</td>
                                                        <td>{{ $jualbarang->jumlah_barang }}</td>
                                                        <td>{{ $jualbarang->total_harga}}</td>
                                                    </tr>    
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </td>
                                <td>{{ $transaksi->total_harga }}.00 $</td>
                                <td>{{ $transaksi->created_at }}</td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</div>
