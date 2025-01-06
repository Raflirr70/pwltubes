@php
    use App\Models\Toko;
@endphp
<x-app-layout>
    <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase">
                {{ Auth::user()->toko->name }}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-20">
                |
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-5">
                {{ Auth::user()->role->name }}
            </h2>
        </div>
    </x-slot>

    <div class="flex mt-10">
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @php $empty=false @endphp
                    @foreach ($gudangs as $gudang)
                        @if ($belibarangs->where('id_gudang', $gudang->id)->isEmpty()) @php continue; @endphp @endif
                        @php $empty=true @endphp
                        <h1 class="flex justify-center text-2xl font-semibold">Riwayat Pembelian Barang</h1>
                        <h1 class="flex justify-center text-2xl font-semibold">{{ Toko::where('id', $gudang->id)->first()->name }}</h1>
                    
                        <table class="min-w-full bg-white border border-gray-600 rounded-lg shadow-lg my-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">No</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">ID Pembelian</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Nama Barang</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Jumlah Barang</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Harga Unit</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php $totalharga = 0 @endphp
                                @foreach ($belibarangs->where('id_gudang', $gudang->id) as $belibarang)
                                    @php
                                    //    $subtotal = $belibarang->jumlah_barang * $belibarang->barang->harga_barang;
                                    //    $totalharga += $subtotal;
                                    $barang = $barangs->where('id', $belibarang->id_barang)->first();
                                    @endphp
                                    <tr>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-center">{{ $loop->iteration }}</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-center">{{ $belibarang->id }}</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r">{{ $barang->name }}</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-center">{{ $belibarang->jumlah_barang }} unit</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-right">{{ $barang->harga_barang - ($barang->harga_barang * 0.1) }}.00 $</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-right">{{ $belibarang->total_harga }} $</td>
                                        
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 border-gray-600 border-b border-r text-center bg-green-200" colspan="4">Total</td>
                                    <td class="px-4 py-2 border-gray-600 border-b border-r text-right bg-green-200" colspan="2">{{ number_format($totalharga, 2) }} $</td>
                                </tr>
                            </tbody>
                        </table>
                    @endforeach
                    @if ($empty == false)
                        <h1 class="flex justify-center text-2xl font-semibold">Belum Ada Pembelian</h1>
                    @endif
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
