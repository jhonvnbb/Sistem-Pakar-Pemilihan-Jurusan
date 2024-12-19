<section class="bg-gray-100 p-6 py-24" id="hasil-diagnosa">
    <div class="container mx-auto max-w-2xl p-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Hasil Diagnosa</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            Berdasarkan minat bakat yang Anda pilih, berikut adalah jurusan yang paling cocok untuk Anda:
        </p>

        <div class="bg-white p-6 rounded-lg shadow-md">
            <h3 class="text-xl font-semibold text-gray-800 dark:text-white mb-4">Jurusan: {{ $jurusanTerkait['jurusan'] }}</h3>
            <p class="text-gray-700 dark:text-gray-300">Kesesuaian: {{ $jurusanTerkait['kesesuaian'] }}</p>
        </div>
    </div>
</section>