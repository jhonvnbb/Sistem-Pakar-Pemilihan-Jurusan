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
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                        <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-6">Tambah Data Jurusan</h1>

                        <form action="{{ route('admin.jurusan.store') }}" method="POST">
                            @csrf
                            <div class="mb-5">
                                <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode</label>
                            <input type="text" id="kode" name="kode" 
                                class="p-3 w-full rounded-md border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm" 
                                required>
                        </div>

                        <div class="mb-5">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Jurusan</label>
                            <input type="text" id="nama" name="nama" 
                                class="p-3 w-full rounded-md border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm" 
                                required>
                        </div>
                        
                        <div class="mb-5">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Deskripsi Jurusan</label>
                            <input type="text" id="deskripsi" name="deskripsi" 
                                class="p-3 w-full rounded-md border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm" 
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="kriteria" class="block text-sm font-medium text-gray-700">Pilih Kriteria</label>
                            <div id="kriteria-list">
                                @foreach ($minatBakat as $item)
                                <div class="flex items-center space-x-4 mb-2">
                                    <input type="checkbox" id="kriteria_{{ $item->kode }}" name="kriteria[{{ $item->kode }}]" value="{{ $item->kode }}" class="form-checkbox h-5 w-5">
                                    <label for="kriteria_{{ $item->kode }}" class="text-gray-700">{{ $item->deskripsi }}</label>

                                    <select name="bobot[{{ $item->kode }}]" class="form-select h-8 w-20 border rounded-md">
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

                        <button type="submit" 
                            class="w-full md:w-auto bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300 shadow-md">
                            <i class="fas fa-save mr-2"></i> Simpan Data
                        </button>
                    </form>
                </div>

            </div>
        </div>
    </x-app-layout>

</body>
</html>
