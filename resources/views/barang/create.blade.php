<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Barang') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('barang.store') }}" enctype="multipart/form-data"
                        class="mt-6 space-y-6">
                        @csrf
                        <div class="max-w-xl">
                            <x-input-label for="name" value="Nama Barang" />
                            <x-text-input id="name" type="text" name="name" class="mt-1 block w-full"
                                value="{{ old('name') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>
                        <div class="max-w-xl">
                            <x-input-label for="harga_barang" value="Harga Barang" />
                            <x-text-input id="harga_barang" type="number" name="harga_barang" class="mt-1 block w-full"
                                value="{{ old('harga_barang') }}" required />
                            <x-input-error class="mt-2" :messages="$errors->get('harga_barang')" />
                        </div>
                        <x-secondary-button tag="a" action="{{ route('indexbarang') }}">Cancel</x-secondary-button>
                        <x-primary-button name="save" value="true">Save</x-primary-button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
