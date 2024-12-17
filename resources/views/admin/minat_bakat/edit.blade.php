@extends('layouts.admin')

@section('content')
<div class="p-6 bg-white dark:bg-gray-800 rounded-lg shadow-md">
    <h1 class="text-2xl font-semibold text-gray-800 dark:text-white mb-4">Edit Data Minat Bakat</h1>

    <form action="{{ route('admin.minat_bakat.update', $minatBakat->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-4">
            <label for="kode" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Kode</label>
            <input type="text" id="kode" name="kode" value="{{ $minatBakat->kode }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4">
            <label for="deskripsi" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Deskripsi</label>
            <input type="text" id="deskripsi" name="deskripsi" value="{{ $minatBakat->deskripsi }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <div class="mb-4">
            <label for="nilai_mb" class="block text-sm font-medium text-gray-700 dark:text-gray-300">Nilai MB</label>
            <input type="number" step="0.1" min="0" max="1" id="nilai_mb" name="nilai_mb" value="{{ $minatBakat->nilai_mb }}" class="mt-1 p-3 block w-full border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-600" required>
        </div>

        <button type="submit" class="bg-green-600 text-white px-6 py-2 rounded-md hover:bg-green-700 transition duration-300">
            <i class="fas fa-edit mr-2"></i> Perbarui Data
        </button>
    </form>
</div>
@endsection
