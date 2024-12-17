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
                <h1 class="text-2xl font-bold text-gray-800 dark:text-gray-200">Selamat Datang, Admin!</h1>
                <p class="mt-4 text-gray-600 dark:text-gray-400">
                    Gejala Page
                </p>
            </div> 
        
        </div>
    </x-app-layout>
</body>
</html>