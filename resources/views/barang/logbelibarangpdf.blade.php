@php
    use App\Models\Toko;
@endphp
<div>
    <div>
        <div>
            <div>
                @php $empty=false @endphp
                @foreach ($gudangs as $gudang)
                    @if ($belibarangs->where('id_gudang', $gudang->id)->isEmpty()) @php continue; @endphp @endif
                    @php $empty=true @endphp
                    <h1>Riwayat Pembelian Barang</h1>
                    <h1>{{ Toko::where('id', $gudang->id)->first()->name }}</h1>
                
                    <table border="1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Supervisor</th>
                                <th>ID Pembelian</th>
                                <th>Nama Barang</th>
                                <th>Jumlah Barang</th>
                                <th>Harga Unit</th>
                                <th>Total Harga</th>
                                <th>Tanggal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $totalharga = 0 @endphp
                            @foreach ($belibarangs->where('id_gudang', $gudang->id) as $belibarang)
                                @php
                                $totalharga += $totalharga + $belibarang->total_harga;
                                $barang = $barangs->where('id', $belibarang->id_barang)->first();
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ Auth::user()->firstname.' '.Auth::user()->lastname }}</td>
                                    <td>{{ $belibarang->id }}</td>
                                    <td>{{ $barang->name }}</td>
                                    <td>{{ $belibarang->jumlah_barang }} unit</td>
                                    <td>{{ $barang->harga_barang - ($barang->harga_barang * 0.1) }}.00 $</td>
                                    <td>{{ $belibarang->total_harga }} $</td>
                                    <td>{{ $belibarang->created_at }} $</td>
                                </tr>
                            @endforeach
                            <tr>
                                <td colspan="5">Total</td>
                                <td>{{ number_format($totalharga, 2) }} $</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                @endforeach
                @if ($empty == false)
                    <h1>Belum Ada Pembelian</h1>
                @endif
            </div>
        </div>
    </div>
</div>
