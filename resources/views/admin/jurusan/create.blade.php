<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">

    <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen">

            @include('admin.sidebar')

            <div :class="open ? 'ml-64' : 'ml-16'" class="flex-1 p-6 transition-all duration-300">
                <div class="p-8 bg-white dark:bg-gray-800 rounded-lg shadow-lg">
                    <h1 class="text-3xl font-semibold text-gray-800 dark:text-white mb-8">Tambah Data Jurusan</h1>

                    <form action="{{ route('admin.jurusan.store') }}" method="POST">
                        @csrf

                        <div class="mb-6">
                            <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode</label>
                            <input 
                                type="text" 
                                id="kode" 
                                name="kode" 
                                class="p-3 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition" 
                                placeholder="Masukkan kode jurusan"
                                required 
                                readonly>
                        </div>

                        <!-- Nama -->
                        <div class="mb-6">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Jurusan</label>
                            <input 
                                type="text" 
                                id="nama" 
                                name="nama"
                                class="p-3 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition" 
                                placeholder="Masukkan nama jurusan"
                                required>
                        </div>

                        <!-- Deskripsi -->
                        <div class="mb-6">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Deskripsi Jurusan</label>
                            <textarea 
                                id="deskripsi" 
                                name="deskripsi"
                                class="p-3 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition resize-none" 
                                placeholder="Masukkan deskripsi jurusan"
                                required>
                            </textarea>
                        </div>

                        <!-- Kriteria -->
                        <div class="mb-6">
                            <label for="kriteria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Pilih Kriteria</label>
                            <div id="kriteria-list" class="space-y-3">
                                @foreach ($minatBakat as $item)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center space-x-3">
                                            <input 
                                                type="checkbox" 
                                                id="kriteria_{{ $item->kode }}" 
                                                name="kriteria[{{ $item->kode }}]" 
                                                value="{{ $item->kode }}" 
                                                class="form-checkbox h-5 w-5 text-blue-600 focus:ring-blue-500 border-gray-300 dark:border-gray-600">
                                            <label for="kriteria_{{ $item->kode }}" class="text-gray-700 dark:text-gray-300">{{ $item->deskripsi }}</label>
                                        </div>
                                        <select 
                                            name="bobot[{{ $item->kode }}]" 
                                            class="form-select h-10 w-24 border border-gray-300 dark:border-gray-600 rounded-md focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition">
                                            <option value="0.0">0.0</option>
                                            <option value="0.2">0.2</option>
                                            <option value="0.4">0.4</option>
                                            <option value="0.6">0.6</option>
                                            <option value="0.8">0.8</option>
                                            <option value="1.0">1.0</option>
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button 
                            type="submit" 
                            class="w-full md:w-auto bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition duration-300 shadow-md focus:outline-none focus:ring-4 focus:ring-blue-300">
                            <i class="fas fa-save mr-2"></i> Simpan Data
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </x-app-layout>

    <script>
        const lastCode = "{{ $lastCode }}";

        // Fungsi untuk menghasilkan kode berikutnya
        function generateNextCode(lastCode) {
            // Ekstrak angka dari kode terakhir
            const codeNumber = parseInt(lastCode.slice(1)) || 0;
            // Tambahkan 1 ke angka dan kembalikan dalam format JXX
            return 'J' + String(codeNumber + 1).padStart(2, '0');
        }

        document.getElementById('kode').value = generateNextCode(lastCode);
    </script>

</body>
</html>
