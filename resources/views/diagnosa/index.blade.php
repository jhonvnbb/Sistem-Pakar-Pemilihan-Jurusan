<section class="bg-gray-100 p-6 py-24" id="diagnosa">
    <div class="container mx-auto max-w-2xl p-4">
        <h2 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Sistem Pakar Pemilihan Jurusan</h2>
        <p class="text-lg text-gray-600 dark:text-gray-400 mb-6">
            Pilih minat bakat Anda untuk mengetahui jurusan yang paling cocok dengan minat Anda.
        </p>

        <form action="{{ route('diagnosa.proses') }}" method="POST">
            @csrf
            <div class="mb-6">
                <label for="minat_bakat" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Pilih Minat Bakat Anda</label>
                <div class="space-y-4 mt-2">
                    @foreach ($minatBakat as $item)
                        <div class="flex items-center">
                            <input type="checkbox" id="minat_bakat_{{ $item->kode }}" name="minat_bakat[]" value="{{ $item->kode }}" class="form-checkbox h-5 w-5 text-blue-600" />
                            <label for="minat_bakat_{{ $item->kode }}" class="ml-2 text-gray-700 dark:text-gray-300">{{ $item->deskripsi }}</label>
                        </div>
                    @endforeach
                </div>
            </div>

            <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 border rounded inline-block">
                Mulai Diagnosa
            </button>
        </form>
    </div>
</section>