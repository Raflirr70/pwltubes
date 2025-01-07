<div>
    <div>
        <div>
            <div>
                @if (Auth::user()->id == 1)
                    <h1>Daftar Toko</h1>
                @elseif (Auth::user()->role->id == 2)
                    <h1>Toko {{Auth::user()->toko->name}}</h1>
                @endif
                <table border="1">
                    <thead>
                        <tr>
                            @if (Auth::user()->id == 1)
                                <th>id</th>
                            @endif
                            <th>Nama</th>
                            <th>Pendapatan Kotor</th>
                            <th>Pendapatan Bersih</th>
                            <th>Biaya Hilang</th>
                        </tr>
                    </thead>

                    <tbody border="1">
                        @php $total =0 @endphp
                        @foreach ($tokos as $toko)
                            @if ($toko->id == Auth::user()->id_toko || Auth::user()->id == 1)
                                <tr>
                                    @if (Auth::user()->id == 1)
                                        <td> {{$toko->id}}</td>
                                    @endif
                                    <td>{{ $toko->name }}</td>
                                    <td> {{ $toko->pendapatan}} $</td>
                                    <td> @include('toko.pendapatanbersih', ['idtoko' => $toko->id]).00 $</td>
                                    <td> @include('toko.biayahilang', ['idtoko' => $toko->id]).00 $</td>
                                    @php
                                        $biayaHilang = view('toko.biayahilang',['idtoko' => $toko->id])->render();
                                        $total += (float) $biayaHilang;
                                    @endphp 
                                </tr>
                            @endif
                        @endforeach
                        {{-- <tr>
                            <td colspan="4">Total</td>
                            <td>100 $</td>
                            @if ($toko->id == Auth::user()->id_role-1)
                                <td></td>
                            @endif
                        </tr> --}}
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
