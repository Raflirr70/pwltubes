@php
    use App\Models\Toko ;
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase">
                {{ Auth::user()->toko->name}}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-20">
                |
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-5">
                {{ Auth::user()->role->name}}
            </h2>
        </div>
    </x-slot>
    <div class="flex mt-10">
        {{-- left card --}}
        <div class="w-full sm:px-6 lg:px-8 h-full">
            <div class="flex justify-end mx-5">
                <a href="{{ route('logpesanan.pdf') }}" class="flex w-40 justify-center bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                    Cetak PDF
                </a>
            </div>
            <div class="text-4xl flex w-full justify-center">
                <h1> Riwayat Transaksi <h1>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php $ii = 0; @endphp
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg mb-10">
                        <thead>
                            <tr>
                                <th class="px-2 py-2 border border-black bg-slate-400 ">No</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">No Transaksi</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Nama Cabang</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Nama Pembeli</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Jumlah Barang</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Datar Barang</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Total Harga</th>
                                <th class="px-4 py-2 border border-black bg-slate-400 ">Date</th>
                            </tr>
                        </thead>
                        @foreach ($transaksis as $transaksi)
                            <tbody>
                                @php 
                                    $ii++;
                                @endphp
                                <tr>
                                    <td class="px-2 py-2 border border-black text-center">{{ $ii }}</td>
                                    <td class="px-4 py-2 border border-black text-center">{{ $transaksi->id }}</td>
                                    <td class="px-4 py-2 border border-black text-center">{{ Toko::where('id', $transaksi->id_toko)->first()->name }}</td>
                                    <td class="px-2 py-2 border border-black text-center">{{ $transaksi->user->firstname. ' ' .$transaksi->user->lastname}}</td>
                                    <td class="px-4 py-2 border border-black text-center">{{ $nama_kasir }}</td>
                                    <td class="px-4 py-2 border border-black text-center">{{ $transaksi->total_barang }}</td>
                                    <td class="px-2 py-2 border border-black">
                                        <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                                            <thead>
                                                <tr>
                                                    <th class="px-2 py-2 border-r border-b border-gray-400 bg-slate-300 ">No</th>
                                                    <th class="px-4 py-2 border-r border-b border-gray-400 bg-slate-300 ">name</th>
                                                    <th class="px-4 py-2 border-r border-b border-gray-400 bg-slate-300 ">Harga Barang</th>
                                                    <th class="px-4 py-2 border-r border-b border-gray-400 bg-slate-300 ">Jumlah Unit</th>
                                                    <th class="px-4 py-2 border-r border-b border-gray-400 bg-slate-300 ">Total</th>
                                                </tr>
                                            </thead>
                                            @php $i = 0; @endphp
                                            <tbody>
                                                @foreach ($jualbarangs as $jualbarang)
                                                    @if ($jualbarang->id_transaksi == $transaksi->id)
                                                        @php $i ++; @endphp
                                                        <tr>
                                                            <td class="px-2 py-2 border-b border-r ">{{ $i }}</td>
                                                            <td class="px-4 py-2 border-b border-r">{{ $barangs->get($jualbarang->id_barang - 1)->name }}</td>
                                                            <td class="px-4 py-2 border-b border-r">{{ $barangs->get($jualbarang->id_barang - 1)->harga_barang }}</td>
                                                            <td class="px-4 py-2 border-b border-r">{{ $jualbarang->jumlah_barang }}</td>
                                                            <td class="px-4 py-2 border-b border-r">{{ $jualbarang->total_harga}}</td>
                                                        </tr>    
                                                    @endif
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </td>
                                    <td class="px-4 py-2 border border-black text-right">{{ $transaksi->total_harga }}.00 $</td>
                                    <td class="px-4 py-2 border border-black text-center">{{ $transaksi->created_at}}</td>
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
