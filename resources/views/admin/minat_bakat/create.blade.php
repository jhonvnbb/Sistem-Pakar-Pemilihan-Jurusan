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
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Tambah Data Minat Bakat</h1>

                    <form action="{{ route('admin.minat_bakat.store') }}" method="POST">
                        @csrf
                        <div class="mb-4">
                            <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode</label>
                            <input type="text" id="kode" name="kode" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <div class="mb-4">
                            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
                            <input type="text" id="deskripsi" name="deskripsi" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
                        </div>

                        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-save mr-2"></i> Simpan Data
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
