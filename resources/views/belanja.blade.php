@php
    use App\Models\BarangGudang;
    use Illuminate\Support\Facades\Auth;
@endphp
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toko Jayusman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <style>
        /* Untuk browser berbasis WebKit (Chrome, Edge, Safari) */
        input[type="number"]::-webkit-inner-spin-button,
        input[type="number"]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        /* Untuk Firefox */
        input[type="number"] {
            -moz-appearance: textfield;
        }
    </style>
</head>
<body>
    @if (Auth::check())
        <x-app-layout>
        </x-app-layout>
    @endif
    <div class="flex flex-col h-20 w-full justify-center items-center">
        <h1 class="text-3xl font-bold"> Selamat Datang </h1>
        <h1 class="text-xl font-bold">
            Di Toserba 
            @if (Auth::check())
                Cabang {{ Auth::user()->toko->name }}
            @else
                Cabang Cipanas
            @endif
        </h1>
        
    </div>
    <div class="flex bg-gray-200 text-gray-800 w-full justify-center pb-16">
        <div class="container py-6">
            <!-- Konten Anda -->
            <form method="POST" action="{{ route('jualbarang') }}">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 pl-0 mx-auto">
                @php
                    $i = 0;
                @endphp
                    @auth
                        <input type="hidden" name="idtoko" value="{{ Auth::user()->id_toko }}">
                        <input type="hidden" name="iduser" value="{{ Auth::user()->id }}">
                    @endauth
                    @foreach ($barangs as $barang)
                        @php
                            $i++;
                        @endphp
                        <div class="flex items-start border rounded-lg shadow-lg h-28 overflow-hidden bg-white">
                            <!-- Bagian Kiri: Gambar -->
                            <div class="w-2/4">
                                @php 
                                $lowercaseName = strtolower($barang->name);
                                $aset = 'asset/'.$lowercaseName.'.jpeg';
                                
                                @endphp
                                <img src="{{ asset($aset) }}" alt="Gambar Barang" 
                                    class="w-full rounded-lg shadow-md cursor-pointer" 
                                    onclick="showModal('{{ asset($aset) }}')">
                            </div>
                            <div class="w-2 h-full bg-gray-400"></div>
                            <div class="w-6 h-full"></div>
                            <!-- Bagian Kanan: Informasi Barang -->
                            <div class="w-full">
                                <div class="flex flex-row w-full">
                                    <h2 class="text-2xl font-bold">{{ $barang->name }}</h2>
                                    <p class="flex ml-auto mr-4 items-end font-semibold text-sm">{{ $barang->harga_barang }} $</p>
                                    <input type="hidden" name="idbarang{{$i}}" value="{{$i}}">
                                    <input type="hidden" name="hargabarang{{$i}}" value="{{$barang->harga_barang}}">
                                </div>
                                @php $stock = 0 @endphp 
                                @if(Auth::check())
                                    @php $stock = BarangGudang::where('id_barang', $barang->id)->where('id_gudang', Auth::user()->id_toko)->first()->jumlah_barang @endphp
                                @else
                                    @php $stock = BarangGudang::where('id_barang', $barang->id)->where('id_gudang', 1)->first()->jumlah_barang @endphp
                                @endif
                                @if ($stock == 0)
                                    <p class="flex justify-end mr-4 text-red-600 font-semibold text-sm">0 Stock: Sold Out</p>
                                @else
                                <p class="flex justify-end mr-4 text-green-600 font-semibold text-sm">{{ $stock }} Stock: Tersedia</p>
                                @endif

                                <div class="flex items-center justify-end mt-4 mr-10 gap-4">
                                    <!-- Tombol Kurang -->
                                    <button id="decrease-{{ $i }}"  type="button"
                                        class="decrease p-2 bg-blue-300 hover:bg-blue-400 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2 text-gray-600" 
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                    <!-- Jumlah Dibeli -->
                                    <input  id="quantity{{ $i }}" name="quantity{{ $i }}" type="number" 
                                        value="0" min="0" readonly 
                                        class="quantity w-16 h-6 text-center bg-none border">
                                    <!-- Tombol Tambah -->
                                    <button id="increase-{{ $i }}" type="button"
                                        class="increase p-2 bg-blue-300 hover:bg-blue-400 rounded-full">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2 text-gray-600" 
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                            <line x1="12" y1="5" x2="12" y2="19"></line>
                                            <line x1="5" y1="12" x2="19" y2="12"></line>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <input type="hidden" name="i" value="{{$i}}">
                    @auth
                        <!-- Tombol Beli -->
                        <div class="fixed bottom-0 left-0 right-0 mx-auto w-3/5 h-16">
                            <button class="w-full h-[90%] bg-blue-500 text-white font-bold text-xl hover:bg-blue-600 rounded-lg">
                                Beli
                            </button>
                        </div>
                    @endauth
                </div>
            </div>
            </form>
            @if (Auth::check())
                <!-- Tombol Logout -->
                <div class="fixed h-16 bottom-0 left-5 w-1/6">
                    <form action="{{ route('logout') }}" method="POST" class="flex justify-center items-center text-white font-bold text-xl w-full h-[90%] bg-gray-500 hover:bg-gray-600 rounded-lg mx-[5px]">
                        @csrf
                        <button 
                            type="submit" 
                            class="flex justify-center items-center">
                            Logout
                        </button>
                    </form>
                </div>   
                <a href="{{ route('transaksi') }}">
                    <div class="fixed h-16 bottom-0 right-5 w-1/6">
                        <button class="flex justify-center items-center text-gray-700 font-bold text-xl w-full h-[90%] bg-yellow-400 hover:bg-yellow-500 rounded-lg mx-[5px]">
                            Keranjang
                        </button>
                    </div>
                </a>
                <!-- Tombol Keranjang -->
                
            @else
                <!-- Tombol Kembali -->
                <div class="fixed h-16 bottom-0 left-5 w-1/6">
                    <button 
                        class="flex justify-center items-center text-white font-bold text-xl w-full h-[90%] bg-gray-500 hover:bg-gray-600 rounded-lg mx-[5px]" 
                        onclick="window.location.href='/'">
                        Kembali
                    </button>
                </div>  
            @endif
        </div>
    </div>
    
    


    <!-- Modal -->
    <div id="imageModal" class="fixed top-0 left-0 w-full h-full bg-black bg-opacity-75 flex items-center justify-center hidden">
        <div class="relative bg-white p-3 rounded-xl">
            <img id="modalImage" src="" alt="Gambar Besar" class="max-w-60 max-h-full">
            <button class="absolute top-2 right-2 bg-black opacity-50 text-white px-2 py-1 rounded" onclick="hideModal()">X</button>
        </div>
    </div>
    

    <script>
        // Fungsi untuk menampilkan modal
        function showModal(imageSrc) {
            const modal = document.getElementById('imageModal');
            const modalImage = document.getElementById('modalImage');
            modalImage.src = imageSrc;
            modal.classList.remove('hidden');
        }

        // Fungsi untuk menyembunyikan modal
        function hideModal() {
            const modal = document.getElementById('imageModal');
            modal.classList.add('hidden');
        }

        // Mengelola tombol dinamis
        document.addEventListener('DOMContentLoaded', () => {
            const decreaseButtons = document.querySelectorAll('.decrease');
            const increaseButtons = document.querySelectorAll('.increase');

            decreaseButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    console.log('Decrease button clicked:', index + 1); // Debugging
                    const quantityInput = document.getElementById(`quantity${index + 1}`);
                    let currentValue = parseInt(quantityInput.value) || 0;
                    if (currentValue > 0) {
                        quantityInput.value = currentValue - 1;
                    }
                });
            });

            increaseButtons.forEach((button, index) => {
                button.addEventListener('click', () => {
                    console.log('Increase button clicked:', index + 1); // Debugging
                    const quantityInput = document.getElementById(`quantity${index + 1}`);
                    let currentValue = parseInt(quantityInput.value) || 0;
                    quantityInput.value = currentValue + 1;
                });
            });
        });
    </script>
</body>
</html>
