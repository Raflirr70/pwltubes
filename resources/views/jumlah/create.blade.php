<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Jumlah Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">

                    <form method="post" action="{{ route('jumlah.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="id_gudang" value="Gudang" />
                            <x-text-input id="id_gudang" name="id_gudang" value="{{ old('id_gudang', Auth::user()->id_toko) }}" class="mt-1 block w-full" required />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="id_barang" value="Barang" />
                            <x-select-input id="id_barang" name="id_barang" class="mt-1 block w-full" required>
                                <option value="">Open this select menu</option>
                                @foreach ($barangs as $key => $value)
                                    @if (old('id_barang') == $key)
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                        <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @endif
                                @endforeach
                            </x-select-input>
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="jumlah_barang" value="Jumlah Barang" />
                            <x-text-input id="jumlah_barang" type="text" name="jumlah_barang" class="mt-1 block w-full"
                                value="{{ old('jumlah_barang') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('jumlah_barang')" />
                        </div>
                        <x-secondary-button tag="a" action="{{ route('indexbarang') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
