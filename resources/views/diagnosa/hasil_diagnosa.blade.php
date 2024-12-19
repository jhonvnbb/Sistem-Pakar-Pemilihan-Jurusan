<section class="bg-gray-100 p-6 py-24" id="hasil-diagnosa">
    <div class="container mx-auto max-w-2xl p-4">
        <h2 class="text-3xl font-bold text-gray-800 dark:text-white mb-6 text-center">
            Hasil Diagnosa
        </h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-8 text-center">
            Berdasarkan minat bakat yang Anda pilih, berikut adalah jurusan yang paling cocok untuk Anda:
        </p>

        <div class="bg-white p-8 rounded-lg shadow-lg border border-gray-200">
            <h3 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4 text-center">
                Jurusan: {{ $jurusanTerkait['jurusan'] }}
            </h3>
            <p class="text-gray-700 dark:text-gray-300 text-center text-lg">
                Tingkat Kesesuaian: <span class="font-semibold text-green-600">{{ $jurusanTerkait['cf'] }}</span>
            </p>
        </div>

        <div class="mt-12">
            <h4 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">
                Rekomendasi Lainnya
            </h4>
            <ul class="space-y-4">
                @foreach ($hasilCF as $hasil)
                    @if ($hasil['jurusan'] !== $jurusanTerkait['jurusan'])
                        <li class="bg-gray-50 p-4 rounded-lg shadow-sm flex justify-between items-center">
                            <span class="text-gray-700 dark:text-gray-300 font-medium">
                                {{ $hasil['jurusan'] }}
                            </span>
                            <span class="text-green-500 font-semibold">
                                {{ $hasil['cf'] }}
                            </span>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
    </div>
</section>
