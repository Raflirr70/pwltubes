<x-app-layout>
    <div class="py-12 flex">
        {{-- left card --}}
        <div class="w-full sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h1 class="text-2xl font-semibold mb-4">Daftar User</h1>

                    {{-- Tabel untuk menampilkan data user --}}
                    <table class="min-w-full bg-white border border-gray-300 rounded-lg shadow-lg">
                        <thead>
                            <tr>
                                <th class="px-4 py-2 border-b">ID</th>
                                <th class="px-4 py-2 border-b">Nama</th>
                                <th class="px-4 py-2 border-b">Role</th>
                                <th class="px-4 py-2 border-b">Cabang</th>
                            </tr>
                        </thead>
                        <tbody>
                        
                            @foreach ($users as $user)
                            {{-- @dd($user->role) --}}
                            {{-- @dd($users); --}}
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $user->id }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->firstname }} {{ $user->lastname }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->role->name }}</td>
                                    <td class="px-4 py-2 border-b">{{ $user->toko->name }}</td>

                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="float-end px-3 pb-3">
                    <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-white text-gray-800 hover:bg-gray-200 disabled:opacity-50 disabled:pointer-events-none dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                        Edit Information
                    </button>
                </div>
            </div>
        </div>
        {{-- right card --}}
        <div class="w-1/3 mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    {{-- You can add more content for the right card if needed --}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
