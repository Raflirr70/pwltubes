<x-app-layout>
    <div class="flex mt-10">
        {{-- left card --}}
        <div class="w-full sm:px-6 lg:px-8 h-full">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="flex justify-center text-2xl font-semibold mb-4">Daftar Transaksi</h1>
                    
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-2 py-2 border-r border-b border-gray-300 bg-slate-400 ">No</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">No Transaksi</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Jumlah Barang</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Total Harga</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Date</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Status</th>
                            </tr>
                        </thead>
                        @php $i = 0; @endphp
                        <tbody>
                            @foreach ($transaksis as $transaksi)
                                @php $i ++; @endphp
                                <tr>
                                    <td class="px-2 py-2 border-b border-r text-center">{{ $i }}</td>
                                    <td class="px-4 py-2 border-b border-r text-center">{{ $transaksi->id }}</td>
                                    <td class="px-4 py-2 border-b border-r text-center">{{ $transaksi->total_barang }} unit</td>
                                    <td class="px-4 py-2 border-b border-r text-right">{{ $transaksi->total_harga }}.00 $</td>
                                    <td class="px-4 py-2 border-b border-r text-center">{{ $transaksi->created_at}}</td>
                                    @if ($transaksi->status == 0)
                                        <td class="flex justify-center px-4 py-2 border-b border-r bg-yellow-500 font-bold">Prosess</td>
                                    @else
                                        <td class="flex justify-center px-4 py-2 border-b border-r bg-green-500 font-bold">Diterima</td>
                                    @endif
                                        
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
