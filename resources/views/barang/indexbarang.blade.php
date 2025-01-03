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
                    @foreach ($gudangs as $gudang)
                        @php
                            $nametoko = Auth::user()->toko->firstWhere('id', $gudang->id_toko);
                        @endphp
                        
                        <h1 class="flex justify-center text-2xl font-semibold">Daftar Barang </h1>
                        <h1 class="flex justify-center text-2xl font-semibold">{{$nametoko->name}}</h1>
                    
                        <table class="min-w-full bg-white border border-gray-600 rounded-lg shadow-lg my-4">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">ID</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Nama</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Jumlah Stok</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Harga</th>
                                    <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400">Total Harga</th>
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
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-center">{{ $barang->id }}</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r">{{ $barang->name }}</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-center">{{ $jumlah_stock }} unit</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-right">{{ $barang->harga_barang }} $</td>
                                        <td class="px-4 py-2 border-gray-600 border-b border-r text-right">{{ $subtotal }}.00 $</td>
                                    </tr>
                                @endforeach
                                <tr>
                                    <td class="px-4 py-2 border-gray-600 border-b border-r text-center bg-green-200" colspan="4">Total</td>
                                    <td class="px-4 py-2 border-gray-600 border-b border-r text-right bg-green-200">{{ $totalharga }}.00 $</td>
                                </tr>
                            </tbody>
                        </table>
                        @if (Auth::user()->id == 3)
                            <x-primary-button tag="a" href="{{ route('barang.create') }}">Tambah Barang</x-primary-button>
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>