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
        {{-- Main content --}}
        <div class="w-2/3 sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- Header section --}}
                    <div class="flex justify-between items-center mb-4">
                        <h1 class="text-2xl font-semibold">Daftar Pegawai</h1>
                        <div class="flex gap-3">
                            {{-- Tombol Cetak PDF --}}
                            <a href="{{ route('users.pdf') }}" class="bg-green-500 text-white font-bold py-2 px-4 rounded hover:bg-green-600">
                                Cetak PDF
                            </a>
                            {{-- Tombol Tambah Pegawai --}}
                            <a href="{{ route('tambahpegawai') }}" class="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
                                Tambah Pegawai
                            </a>
                        </div>
                    </div>

                    {{-- Tabel untuk menampilkan data user --}}
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-2 py- border-r border-b border-gray-300 bg-slate-400">#</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400">Nama</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400">Role</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400">Cabang</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400">Email</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php $akun = Auth::user(); @endphp
                            @php $i = 0; @endphp

                            @foreach ($users as $user)
                                @if ($user->id != 1 && $akun->id != $user->id && $user->id_role != 6)
                                    @if ($akun->id_role == 1 || ($akun->id_role == 2 && $akun->id_toko == $user->id_toko))
                                        @php $i++; @endphp
                                        <tr>
                                            <td class="px-2 py-2 border-b border-r">{{ $i }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->firstname }} {{ $user->lastname }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->role->name }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->toko->name }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->email }}</td>
                                            <td class="flex justify-center px-4 py-2 border-b border-r">
                                                <x-delete-button :action="route('users.destroy', $user->id)" />
                                            </td>
                                        </tr>
                                    @endif
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        {{-- Right card --}}
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
            </div>
        </div>
    </div>
</x-app-layout>
