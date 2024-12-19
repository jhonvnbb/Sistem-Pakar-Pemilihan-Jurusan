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

                        <div class="mb-5">
                            <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode</label>
                            <input type="text" id="kode" name="kode" value="{{ $jurusan->kode }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="mb-5">
                            <label for="nama" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nama Jurusan</label>
                            <input type="text" id="nama" name="nama" value="{{ $jurusan->nama }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>
                        
                        <div class="mb-5">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi Jurusan</label>
                            <input type="text" id="deskripsi" name="deskripsi" value="{{ $jurusan->deskripsi }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="mb-6">
                            <label for="kriteria" class="block text-sm font-medium text-gray-700">Pilih Kriteria</label>
                            <div id="kriteria-list">
                                @foreach ($minatBakat as $item)
                                <div class="flex items-center space-x-4 mb-2">
                                    <input 
                                        type="checkbox" 
                                        id="kriteria_{{ $item->kode }}" 
                                        name="kriteria[{{ $item->kode }}]" 
                                        value="{{ $item->kode }}" 
                                        class="form-checkbox h-5 w-5" 
                                        @if(isset($kriteria[$item->kode])) checked @endif
                                    >
                                    <label for="kriteria_{{ $item->kode }}" class="text-gray-700">{{ $item->deskripsi }}</label>

                                    <select 
                                        name="bobot[{{ $item->kode }}]" 
                                        class="form-select h-8 w-20 border rounded-md">
                                        <option value="0.0" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 0.0) selected @endif>0.0</option>
                                        <option value="0.2" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 0.2) selected @endif>0.2</option>
                                        <option value="0.4" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 0.4) selected @endif>0.4</option>
                                        <option value="0.6" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 0.6) selected @endif>0.6</option>
                                        <option value="0.8" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 0.8) selected @endif>0.8</option>
                                        <option value="1.0" @if(isset($kriteria[$item->kode]) && $kriteria[$item->kode] == 1.0) selected @endif>1.0</option>
                                    </select>
                                </div>
                                @endforeach
                            </div>
                        </div>

                        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-300">
                            <i class="fas fa-edit mr-2"></i> Perbarui Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
