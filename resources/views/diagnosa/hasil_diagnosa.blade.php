<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite('resources/css/app.css')
    <title>Sistem Pakar Pemilihan Jurusan</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

<section class="bg-[#abd1c6] p-6 py-18" id="hasil-diagnosa">
    <div class="container mx-auto max-w-3xl p-6">
        <h2 class="text-4xl font-bold text-[#0f3433] mb-8 text-center">
            Hasil Diagnosa Minat dan Bakat
        </h2>
        <p class="text-lg text-[#001e1d] mb-10 text-center">
            Berdasarkan minat dan bakat yang kamu pilih, berikut adalah jurusan yang paling sesuai untuk kamu:
        </p>

        <div class="bg-[#004643] p-8 rounded-lg shadow-lg hover:bg-[#f9bc60] group">
            <h3 class="text-2xl font-semibold text-[#fffffe] mb-6 text-center group-hover:text-[#001e1d]">
                Jurusan: <span class="group-hover:text-[#001e1d] font-bold">{{ $jurusanTerkait['jurusan'] }}</span>
            </h3>
            <p class="text-[#fffffe] text-center text-lg mb-4 group-hover:text-[#001e1d]">
                Tingkat Kesesuaian: <span class="font-semibold text-green-600 group-hover:text-[#004643]">{{ number_format($jurusanTerkait['cf'] * 100, 2) }}%</span>
            </p>
            <p class="text-[#abd1c6] text-center text-md group-hover:text-[#001e1d]">
                {{ $jurusanTerkait['deskripsi'] }}
            </p>
        </div>

                <!-- Hasil Diagnosa (contoh statis) -->
        <div class="mt-10">
            <h3 class="text-2xl font-bold text-[#004643] dark:text-[#abd1c6]">Hasil Diagnosa:</h3>
            <p class="text-gray-700 dark:text-gray-300 mt-5 text-lg">
                Hai <span class="font-bold">{{ Auth::user()->name }}</span>! jadi, berdasarkan minat bakat yang udah kamu pilih, sistem pakar ini merekomendasikan bahwa jurusan yang cocok untuk kamu adalah:</p>
            <div class="mt-4">
                <p class="font-semibold dark:text-gray-300">{{ $jurusanTerkait['jurusan'] }}</p>
                <div class="w-full bg-gray-200 dark:bg-gray-700 rounded-full h-4">
                    <div class="bg-[#004643] h-4 rounded-full" style="width: 80%;"></div>
                </div>
                <p class="text-sm text-gray-500 mt-1">{{ number_format($jurusanTerkait['cf'] * 100, 2) }}% cocok</p>
            </div>
        </div>


        <!-- Rekomendasi Jurusan Lainnya -->
        <div class="mt-16">
            <h4 class="text-2xl font-semibold text-[#0f3433] mb-6 text-center">
                Rekomendasi Jurusan Lainnya
            </h4>
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                @foreach ($hasilDiagnosa as $hasil)
                    @if ($hasil['jurusan'] !== $jurusanTerkait['jurusan'] && $hasil['cf'] > 0)
                        <div class="bg-[#f9bc60] p-6 rounded-lg shadow-sm">
                            <h5 class="text-lg font-semibold text-[#001e1d]">
                                {{ $hasil['jurusan'] }}
                            </h5>
                            <p class="text-sm text-[#001e1d] mt-2">
                                Tingkat Kesesuaian: <span class="font-semibold text-[#004643]">{{ number_format($hasil['cf'] * 100, 2) }}%</span>
                            </p>
                            <p class="text-[#001e1d ] text-md mt-2">
                                {{ $hasil['deskripsi'] }}
                            </p>
                        </div>  
                    @endif
                @endforeach
            </div>
        </div>

    </div>
</section>

<div class="mt-16">
    <h4 class="text-2xl font-semibold text-[#0f3433] mb-6 text-center">
        Visualisasi Hasil Diagnosa
    </h4>
    <canvas id="hasilChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    const data = {
        labels: @json(array_column($hasilDiagnosa, 'jurusan')),
        datasets: [{
            label: 'Tingkat Kesesuaian',
            data: @json(array_map(fn($item) => $item['cf'] * 100, $hasilDiagnosa)),
            backgroundColor: ['#004643', '#abd1c6', '#f9bc60', '#001e1d', '#0f3433'],
            borderWidth: 1
        }]
    };
    const config = {
        type: 'bar', 
        data: data,
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            }
        }
    };
    new Chart(document.getElementById('hasilChart'), config);
</script>

<section class="bg-[#004643] mb-10">
    <div class="container mx-auto py-10">
        <div class="p-2 flex gap-6">
            <!-- Gambar di sebelah kiri -->
            <div class="w-1/2 flex items-center justify-center">
                <img src="{{ asset('images/vector-illustration.png') }}" alt="Deskripsi Gambar" class="w-96 h-96 rounded-lg">
            </div>

            <!-- Tulisan di sebelah kanan -->
            <div class="mt-14 w-1/3 flex flex-col">
                <div>
                    <h2 class="text-2xl font-bold text-[#fffffe] mb-6">Hallo {{ Auth::user()->name }}</h2>
                    <p class="text-xl text-[#abd1c6] mb-6">
                        Di sistem pakar ini kamu sudah menemukan rekomendasi yang cocok sesuai minat bakat kamu!! Tapi, jika masih ragu minat bakat yang kamu miliki, kamu bisa coba lagi ya 😊
                    </p>
                </div>
                
                <!-- Tombol di bawah tulisan -->
                <div class="flex gap-6 mt-10">
                    <a href="{{ route('diagnosa.index') }}" class="bg-[#abd1c6] text-[black] py-3 px-6 rounded-lg shadow-lg hover:bg-[#f9bc60] hover:text-white transition">
                        Coba Lagi
                    </a>
                    <a href="{{ route('home') }}" class="bg-[#e16162] text-white py-3 px-6 rounded-lg shadow-lg hover:bg-red-700 transition">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </div>
</section>

</body>
</html>
