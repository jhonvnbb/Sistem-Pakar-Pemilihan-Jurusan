<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
</head>
<body>

    <x-app-layout>
        <div x-data="{ open: false }" class="flex h-screen">
            <!-- Sidebar -->
            @include('admin.sidebar')

            <!-- Main Content -->
            <div :class="open ? 'ml-64' : 'ml-16'" class="flex-1 p-6 transition-all duration-300">
                <div class="bg-white dark:bg-gray-800 p-6 rounded-lg shadow-md">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Data Minat Bakat</h1>

                    <a href="{{ route('admin.minat_bakat.create') }}" class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300 mb-4 inline-block">
                        <i class="fas fa-plus mr-2"></i>Tambah Data
                    </a>

                    <div class="overflow-x-auto bg-white shadow-md rounded-lg">
                        <table class="min-w-full table-auto">
                            <thead class="bg-gray-100 dark:bg-gray-700 text-gray-600 dark:text-gray-200">
                                <tr>
                                    <th class="px-6 py-3 text-left">Kode</th>
                                    <th class="px-6 py-3 text-left">Deskripsi</th>
                                    <th class="px-6 py-3 text-left">Nilai MB</th>
                                    <th class="px-6 py-3 text-left">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-gray-600 dark:text-gray-200">
                                @foreach ($data as $item)
                                    <tr class="border-b border-gray-200 dark:border-gray-600">
                                        <td class="px-6 py-4">{{ $item->kode }}</td>
                                        <td class="px-6 py-4">{{ $item->deskripsi }}</td>
                                        <td class="px-6 py-4">{{ $item->nilai_mb }}</td>
                                        <td class="px-6 py-4">
                                            <a href="{{ route('admin.minat_bakat.edit', $item->id) }}" class="text-blue-500 hover:text-blue-700 mr-3">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('admin.minat_bakat.destroy', $item->id) }}" method="POST" class="inline-block">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="text-red-500 hover:text-red-700">
                                                    <i class="fas fa-trash-alt"></i> Hapus
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </x-app-layout>

</body>
</html>
