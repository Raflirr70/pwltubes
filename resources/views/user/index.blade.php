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
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg min-h-[460px]">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="flex justify-center text-2xl font-semibold mb-4">Daftar Pegawai</h1>
                    {{-- Tabel untuk menampilkan data user --}}
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-2 py-2 border-r border-b border-gray-300 bg-slate-400 ">ID</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Nama</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Role</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Cabang</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Email</th>
                                <th class="px-4 py-2 border-r border-b border-gray-300 bg-slate-400 ">Action</th>
                            </tr>
                        </thead>

                        @php $akun = Auth::user(); @endphp
                        @php $i = 0; @endphp

                        <tbody>
                            @foreach ($users as $user)
                                @if ($user->id != 1 && $akun->id != $user->id)
                                    @if ($akun->id_role == 1)
                                        @php $i ++; @endphp
                                        <tr>
                                            <td class="px-2 py-2 border-b border-r">{{ $i }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->firstname }} {{ $user->lastname }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->role->name }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->toko->name }}</td>
                                            <td class="px-4 py-2 border-b border-r">{{ $user->email}}</td>
                                            <td class="flex justify-center px-4 py-2 border-b border-r"><x-delete-button :action="route('users.destroy', $user->id)" /></td>
                                        </tr>
                                    @elseif ($akun->id_role == 2)
                                        @if ($akun->id_toko == $user->id_toko)
                                            @php $i ++; @endphp
                                            <tr>
                                                <td class="px-2 py-2 border-b border-r ">{{ $i }}</td>
                                                <td class="px-4 py-2 border-b border-r">{{ $user->firstname }} {{ $user->lastname }}</td>
                                                <td class="px-4 py-2 border-b border-r">{{ $user->role->name }}</td>
                                                <td class="px-4 py-2 border-b border-r">{{ $user->toko->name }}</td>
                                                <td class="px-4 py-2 border-b border-r">{{ $user->email}}</td>
                                                <td class="flex justify-center px-4 py-2 border-b border-r"><x-delete-button :action="route('users.destroy', $user->id)" /></td>
                                            </tr>
                                        @endif
                                    @endif
                                @endif
                            @endforeach
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
