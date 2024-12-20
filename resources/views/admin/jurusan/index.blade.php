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
        <div x-data="{ open: false }" class="flex h-screen bg-gray-100 dark:bg-gray-900">
            <!-- Sidebar -->
            @include('admin.sidebar')
            <!-- Main Content -->
            <div :class="open ? 'ml-64' : 'ml-16'" class="flex-1 p-6 transition-all duration-300">
                <div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
                    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Data Jurusan</h1>
                    <div class="flex items-center justify-between mb-4">
                        <!-- Search Bar -->
                        <form action="{{ route('admin.jurusan.index') }}" method="GET" class="flex items-center space-x-2">
                                <input 
                            type="text" 
                            name="search" 
                            value="{{ request('search') }}" 
                            placeholder="Cari jurusan..." 
                            class="px-4 py-2 rounded-md border border-gray-300 dark:border-gray-600 focus:ring focus:ring-blue-500 dark:bg-gray-700 dark:text-white"
                        />
                            <button 
                                type="submit" 
                                class="bg-blue-600 text-white px-4 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                                <i class="fas fa-search"></i> Cari
                            </button>
                        </form>
                        <!-- Tambah Data Button -->
                        <a href="{{ route('admin.jurusan.create') }}" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
                            <i class="fas fa-plus mr-2"></i> Tambah Data
                        </a>
                    </div>
                    <div class="w-full bg-white shadow-xl rounded-lg overflow-hidden">
    <table class="w-full border-collapse">
        <thead>
            <tr class="bg-gradient-to-r from-blue-600 to-blue-500 text-white">
                <th class="px-6 py-4 text-left text-sm font-semibold tracking-wide">Kode</th>
                <th class="px-6 py-4 text-left text-sm font-semibold tracking-wide">Nama Jurusan</th>
                <th class="px-6 py-4 text-left text-sm font-semibold tracking-wide">Deskripsi</th>
                <th class="px-6 py-4 text-left text-sm font-semibold tracking-wide">Kriteria</th>
                <th class="px-6 py-4 text-center text-sm font-semibold tracking-wide">Aksi</th>
            </tr>
        </thead>
        <tbody class="divide-y divide-gray-200">
            @foreach ($data as $jurusan)
                <tr class="hover:bg-gray-100 transition duration-300">
                    <td class="px-6 py-4 text-sm text-gray-700 font-medium">{{ $jurusan->kode }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">{{ $jurusan->nama }}</td>
                    <td class="px-6 py-4 text-sm text-gray-600 truncate max-w-xs">{{ $jurusan->deskripsi }}</td>
                    <td class="px-6 py-4 text-sm text-gray-700">
                        @php
                            $kriteriaArray = is_array($jurusan->kriteria) 
                                ? $jurusan->kriteria 
                                : json_decode($jurusan->kriteria, true);
                        @endphp

                        @if (!empty($kriteriaArray))
                            <div class="flex flex-wrap gap-2">
                                @foreach ($kriteriaArray as $kodeKriteria => $bobot)
                                    @php
                                        $namaMinat = $minatBakat->firstWhere('kode', $kodeKriteria)?->deskripsi ?? 'Tidak Ditemukan';
                                    @endphp
                                    <span class="px-3 py-1 text-xs font-medium text-white bg-green-500 rounded-md shadow">
                                        {{ $namaMinat }} ({{ $bobot }})
                                    </span>
                                @endforeach
                            </div>
                        @else
                            <span class="text-gray-500">Tidak Ada Kriteria</span>
                        @endif
                    </td>
                    <td class="px-6 py-4 text-center">
                        <div class="flex justify-center space-x-2">
                            <a href="{{ route('admin.jurusan.edit', $jurusan->id) }}" 
                                class="px-4 py-2 text-sm text-blue-600 bg-blue-100 rounded-lg hover:bg-blue-200 transition duration-300">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                            <form action="{{ route('admin.jurusan.destroy', $jurusan->id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                    class="px-4 py-2 text-sm text-red-600 bg-red-100 rounded-lg hover:bg-red-200 transition duration-300">
                                    <i class="fas fa-trash-alt"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <!-- Pagination -->
    <div class="flex items-center justify-between p-4 bg-gray-50 border-t border-gray-200">
        <p class="text-sm text-gray-600">
            Menampilkan {{ $data->firstItem() }} sampai {{ $data->lastItem() }} dari {{ $data->total() }} data
        </p>
        <div class="flex space-x-1">
            @if ($data->onFirstPage())
                <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">&lt;</span>
            @else
                <a href="{{ $data->previousPageUrl() }}" class="px-3 py-2 text-blue-600 bg-blue-100 rounded hover:bg-blue-200">&lt;</a>
            @endif
            @foreach ($data->getUrlRange(1, $data->lastPage()) as $page => $url)
                <a href="{{ $url }}" class="px-3 py-2 {{ $page == $data->currentPage() ? 'bg-blue-600 text-white' : 'bg-gray-100 text-gray-700' }} rounded hover:bg-blue-200">
                    {{ $page }}
                </a>
            @endforeach
            @if ($data->hasMorePages())
                <a href="{{ $data->nextPageUrl() }}" class="px-3 py-2 text-blue-600 bg-blue-100 rounded hover:bg-blue-200">&gt;</a>
            @else
                <span class="px-3 py-2 text-gray-500 bg-gray-200 rounded">&gt;</span>
            @endif
        </div>
    </div>
</div>


                </div>
            </div>
        </div>
    </x-app-layout>
</body>
</html>