@extends('layouts.admin')

@section('content')
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

        <div class="mb-4">
            <label for="nilai_mb" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai MB</label>
            <input type="number" step="0.1" min="0" max="1" id="nilai_mb" name="nilai_mb" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded-md hover:bg-blue-700 transition duration-300">
            <i class="fas fa-save mr-2"></i> Simpan Data
        </button>
    </form>
</div>
@endsection
