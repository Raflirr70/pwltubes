<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Belanja</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <div class="flex items-center justify-center h-20 bg-slate-800 p-10">
        <h1 class="text-3xl font-bold mb-4 text-white">Halaman Belanja</h1>
    </div>

    <div class="flex bg-gray-100 text-gray-800 w-full justify-center">
    

        <div class="container py-6">
            <!-- Konten Anda -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pl-0 mx-auto">
                <!-- Item -->
                @for ($i=1 ; $i<=10 ; $i++)
                    <div class="flex items-start gap-6 border rounded-lg shadow-lg h-full">
                        <!-- Bagian Kiri: Gambar -->
                        <div class="h-[100%]">
                            <img src="{{ asset('asset/pencil.jpeg') }}" alt="Gambar Barang" class="w-full rounded-lg shadow-md">
                        </div>

                        <!-- Bagian Kanan: Informasi Barang -->
                        <div class="w-full">
                            <!-- Judul -->
                            <h2 class="text-2xl font-bold text-gray-800">Pensil Premium</h2>

                            <!-- Stock -->
                            <p class="text-green-500 font-semibold text-sm">Stock: Tersedia</p>

                        <!-- Input Jumlah -->
                            <div class="flex items-center justify-end mt-4 mr-10 gap-4">
                                <!-- Tombol Kurang -->
                                <button id="decrease" class="p-2 bg-blue-300 hover:bg-blue-400 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h- text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>

                                <!-- Jumlah Dibeli -->
                                <input id="quantity" type="number" value="1" min="1" class="w-16 h-6 text-center bg-none border" />

                                <!-- Tombol Tambah -->
                                <button id="increase" class="p-2 bg-blue-300 hover:bg-blue-400 rounded-full">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="w-2 h-2 text-gray-600" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                                        <line x1="12" y1="5" x2="12" y2="19"></line>
                                        <line x1="5" y1="12" x2="19" y2="12"></line>
                                    </svg>
                                </button>
                            </div>

                            <script>
                                // Ambil elemen input dan tombol
                                const quantityInput = document.getElementById('quantity');
                                const decreaseButton = document.getElementById('decrease');
                                const increaseButton = document.getElementById('increase');

                                // Fungsi untuk mengurangi jumlah
                                decreaseButton.addEventListener('click', () => {
                                    let currentValue = parseInt(quantityInput.value);
                                    if (currentValue > quantityInput.min) {
                                        quantityInput.value = currentValue - 1;
                                    }
                                });

                                // Fungsi untuk menambah jumlah
                                increaseButton.addEventListener('click', () => {
                                    let currentValue = parseInt(quantityInput.value);
                                    quantityInput.value = currentValue + 1;
                                });
                            </script>


                            <!-- Tombol Beli -->
                            <div class="flex justify-center mt-6 ">
                                <button class="w-[80%] h-[30px] text-white bg-blue-600 hover:bg-blue-700 rounded-md font-semibold">
                                    <p class="font"> Beli Sekarang </p>
                                </button>
                            </div>
                        </div>
                    </div>
                @endfor
            </div>
        </div>
    </div>
</body>
</html>
