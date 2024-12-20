<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Sistem Pakar Pemilihan Jurusan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body class="bg-[#004643] min-h-screen flex items-center justify-center">

<section class="py-12 px-4 sm:px-6 lg:px-8">
    <div class="container mx-auto max-w-3xl bg-[#abd1c6] rounded-xl shadow-lg overflow-hidden">
        <!-- Header -->
        <div class="bg-[#f9bc60] py-6 px-8 text-center">
            <h2 class="text-4xl font-extrabold text-[#0f3433]">
                Sistem Pakar Pemilihan Jurusan
            </h2>
            <p class="text-lg text-[#1b1325] mt-5">
                Pilih minat bakat kamu untuk mengetahui jurusan yang paling cocok dengan minat kamu.
            </p>
        </div>

        <!-- Form -->
        <form action="{{ route('diagnosa.proses') }}" method="POST" class="p-8">
            @csrf

            <!-- Checkbox List -->
            <div>
                <label for="minat_bakat" class="block text-lg font-semibold text-[#0f3433] mb-8">
                    Pilih Minat Bakat Kamu dibawah ini ya 😊 bisa ceklist lebih dari 1
                </label>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach ($minatBakat as $item)
                        <div class="flex items-center bg-white shadow-md p-4 rounded-lg hover:bg-[#f9bc60] transition duration-300">
                            <input 
                                type="checkbox" 
                                id="minat_bakat_{{ $item->kode }}" 
                                name="minat_bakat[]" 
                                value="{{ $item->kode }}" 
                                class="form-checkbox h-5 w-5 text-[#004643] focus:ring-2 focus:ring-[#abd1c6]"
                            />
                            <label 
                                for="minat_bakat_{{ $item->kode }}" 
                                class="ml-3 text-gray-700 text-sm"
                            >
                                {{ $item->deskripsi }}
                            </label>
                        </div>
                    @endforeach
                </div>
            </div>

            <!-- Tombol -->
            <div class="flex justify-center mt-8">
                <button 
                    type="submit" 
                    class="bg-[#004643] text-white hover:bg-[#f9bc60] hover:text-black font-bold py-3 px-8 rounded-lg shadow-lg border-2 border-black transition duration-300"
                >
                    Mulai Diagnosa
                </button>
            </div>
        </form>
    </div>
</section>

</body>
</html>
