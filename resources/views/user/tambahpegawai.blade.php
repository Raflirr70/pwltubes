@if(Auth::user()->id_role == 1 || Auth::user()->id_role == 2)
    <x-app-layout>
        <x-slot name="header">
        <div class="flex">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase">
                {{ Auth::user()->toko->name}}
            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-20">

            </h2>
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight uppercase ml-5">
                {{ Auth::user()->role->name}}
            </h2>
        </div>
    </x-slot>
    @include('auth.registerpegawai')
    </x-app-layout>
@endauth
