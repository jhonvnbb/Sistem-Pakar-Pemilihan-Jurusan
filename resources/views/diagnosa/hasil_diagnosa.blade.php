<section class="bg-gray-50 p-6 py-24" id="hasil-diagnosa">
    <div class="container mx-auto max-w-3xl p-6">
        <h2 class="text-4xl font-bold text-gray-800 dark:text-white mb-8 text-center">
            Hasil Diagnosa Minat dan Bakat
        </h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-10 text-center">
            Berdasarkan minat dan bakat yang Anda pilih, berikut adalah jurusan yang paling sesuai untuk Anda:
        </p>

        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6 text-center">
                Jurusan: <span class="text-blue-600">{{ $jurusanTerkait['jurusan'] }}</span>
            </h3>
            <p class="text-gray-700 dark:text-gray-300 text-center text-lg mb-4">
                Tingkat Kesesuaian: <span class="font-semibold text-green-600">{{ number_format($jurusanTerkait['cf'] * 100, 2) }}%</span>
            </p>
            <p class="text-gray-600 dark:text-gray-400 text-center text-md">
                {{ $jurusanTerkait['deskripsi'] }}
            </p>
        </div>

<!-- Rekomendasi Jurusan Lainnya -->
<div class="mt-16">
    <h4 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6 text-center">
        Rekomendasi Jurusan Lainnya
    </h4>
    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        @foreach ($hasilDiagnosa as $hasil)
            @if ($hasil['jurusan'] !== $jurusanTerkait['jurusan'] && $hasil['cf'] > 0)
                <div class="bg-gray-100 dark:bg-gray-800 p-6 rounded-lg shadow-sm border border-gray-300 dark:border-gray-700">
                    <h5 class="text-lg font-semibold text-gray-800 dark:text-white">
                        {{ $hasil['jurusan'] }}
                    </h5>
                    <p class="text-sm text-gray-600 dark:text-gray-400 mt-2">
                        Tingkat Kesesuaian: <span class="font-semibold text-green-600">{{ number_format($hasil['cf'] * 100, 2) }}%</span>
                    </p>
                    <p class="text-gray-600 dark:text-gray-400 text-center text-md">
                        {{ $jurusanTerkait['deskripsi'] }}
                    </p>
                </div>  
            @endif
        @endforeach
    </div>
</div>

    </div>
</section>
