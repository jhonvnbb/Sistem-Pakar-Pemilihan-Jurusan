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
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <div :class="open ? 'ml-64' : 'ml-16'" class="flex-1 p-6 transition-all duration-300">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Edit Data Jurusan</h1>

                    <form action="{{ route('admin.jurusan.update', $jurusan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Kode -->
                        <div class="mb-6">
                            <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Kode</label>
                            <input 
                                type="text" 
                                id="kode" 
                                name="kode" 
                                value="{{ $jurusan->kode }}" 
                                class="p-3 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition" 
                                placeholder="Masukkan kode jurusan"
                                readonly>
                        </div>

                        <!-- Nama -->
                        <div class="mb-6">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-2">Nama Jurusan</label>
                            <input 
                                type="text" 
                                id="nama" 
                                name="nama" 
                                value="{{ $jurusan->nama }}" 
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
                                class="p-3 w-full rounded-lg border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 focus:outline-none dark:bg-gray-700 dark:text-white shadow-sm transition" 
                                rows="4"
                                placeholder="Masukkan deskripsi jurusan"
                                required>{{ $jurusan->deskripsi }}</textarea>
                        </div>

                        <!-- Pilih Kriteria -->
                        <div class="mb-6">
                            <label for="kriteria" class="block text-sm font-medium text-gray-700 dark:text-gray-300 mb-4">Pilih Kriteria</label>
                            <div id="kriteria-list" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                                @foreach ($minatBakat as $item)
                                    <div class="p-4 bg-gray-100 dark:bg-gray-700 rounded-lg shadow hover:shadow-lg transition border border-gray-300 dark:border-gray-600">
                                        <div class="flex items-center space-x-4 mb-3">
                                            <!-- Checkbox Kriteria -->
                                            <input 
                                                type="checkbox" 
                                                id="kriteria_{{ $item->kode }}" 
                                                name="kriteria[{{ $item->kode }}]" 
                                                value="{{ $item->kode }}" 
                                                class="h-5 w-5 text-blue-600 border-gray-300 focus:ring-2 focus:ring-blue-600"
                                                @if(isset($kriteria[$item->kode])) checked @endif>
                                            <label for="kriteria_{{ $item->kode }}" class="text-sm font-medium text-gray-700 dark:text-gray-300">
                                                {{ $item->deskripsi }}
                                            </label>
                                        </div>
                                        <!-- Dropdown Bobot -->
                                        <select 
                                            name="bobot[{{ $item->kode }}]" 
                                            class="w-full h-9 rounded-md border border-gray-300 dark:border-gray-600 focus:ring-2 focus:ring-blue-600 dark:bg-gray-700 dark:text-white">
                                            @foreach ([0.0, 0.2, 0.4, 0.6, 0.8, 1.0] as $bobot)
                                                <option value="{{ $bobot }}" 
                                                    @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == $bobot) selected @endif>
                                                    {{ $bobot }}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                @endforeach
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-lg hover:bg-green-700 transition duration-300">
                            <i class="fas fa-edit mr-2"></i> Perbarui Data
                        </button>
                    </form>
                </div>
            </div>

        </div>
    </x-app-layout>

</body>
</html>
