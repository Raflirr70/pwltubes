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
                <a href="{{ route('toko.pdf') }}" class="flex w-40 justify-center bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                    Cetak PDF
                </a>
            </div>
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if (Auth::user()->id == 1)
                        <h1 class="flex justify-center text-2xl font-semibold mb-4">Daftar Toko</h1>
                    @elseif (Auth::user()->role->id == 2)
                        <h1 class="flex justify-center text-2xl font-semibold mb-4">Toko {{Auth::user()->toko->name}}</h1>
                    @endif

                    
                    {{-- Tabel untuk menampilkan data user --}}
                    <table class="min-w-full bg-white border border-gray-600 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                @if (Auth::user()->id == 1)
                                    <th class="px-2 py-2 border-r border-b border-gray-600 bg-slate-400 ">id</th>
                                @endif
                                <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400 ">Nama</th>
                                <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400 ">Pendapatan Kotor</th>
                                <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400 ">Pendapatan Bersih</th>
                                <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400 ">Biaya Hilang</th>
                                <th class="px-4 py-2 border-r border-b border-gray-600 bg-slate-400 ">Informasi</th>
                            </tr>
                        </thead>

                        <tbody>
                            @php $total =0 @endphp
                            @foreach ($tokos as $toko)
                                @if ($toko->id == Auth::user()->id_toko || Auth::user()->id == 1)
                                    <tr>
                                        @if (Auth::user()->id == 1)
                                            <td class="flex px-2 py-2 border-gray-600 border-r border-b justify-center"> {{$toko->id}}</td>
                                        @endif
                                        <td class="px-4 py-2 border-gray-600 border-b border-r">{{ $toko->name }}</td>
                                        <td class="text-right px-4 py-2 border-gray-600 border-b border-r"> {{ $toko->pendapatan}} $</td>
                                        <td class="text-right px-4 py-2 border-gray-600 border-b border-r"> @include('toko.pendapatanbersih', ['idtoko' => $toko->id]).00 $</td>
                                        <td class="text-right px-4 py-2 border-gray-600 border-b border-r"> @include('toko.biayahilang', ['idtoko' => $toko->id]).00 $</td>
                                        <td class="text-center px-4 py-2 border-gray-600 border-b border-r"><a href="{{ route('toko.index', $toko->id) }}" class="btn btn-primary bg-green-700 text-white py-1 px-3 rounded-md hover:text-lg">Lihat</a></td>
                                        @php
                                            $biayaHilang = view('toko.biayahilang',['idtoko' => $toko->id])->render();
                                            $total += (float) $biayaHilang;
                                        @endphp 
                                    </tr>
                                @endif
                            @endforeach
                            {{-- <tr class="bg-green-100">
                                <td class="px-4 py-2 border-gray-600 border-b border-r text-center" colspan="4">Total</td>
                                <td class="px-4 py-2 border-gray-600 border-b text-right">100 $</td>
                                    @if ($toko->id == Auth::user()->id_role-1)
                                        <td class="px-4 py-2 border-gray-600 border-b"></td>
                                    @endif
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
                {{-- <div class="float-end px-3 pb-3">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Edit Information
                    </button>
                </div> --}}
            </div>
        </div>
        {{-- right card --}}
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- You can add more content for the right card if needed --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>