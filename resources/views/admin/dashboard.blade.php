<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard | Admin</title>
    <script src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-100 dark:bg-gray-900">
    <x-app-layout>
    
        <div class="flex h-screen" x-data="{ open: false }">

            @include('admin.sidebar')

            <div :class="open ? 'ml-64' : 'ml-16'" class="flex-1 p-6 transition-all duration-300">

                <!-- Statistics Cards -->
                <section class="p-6 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Users</h3>
                        <p class="text-4xl font-bold text-blue-500 mt-2">{{ $totalUsers }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Verified Users</h3>
                        <p class="text-4xl font-bold text-green-500 mt-2">{{ $verifiedUsers }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Unverified Users</h3>
                        <p class="text-4xl font-bold text-red-500 mt-2">{{ $unverifiedUsers }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Regular Users</h3>
                        <p class="text-4xl font-bold text-purple-500 mt-2">{{ $userUsers }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Minat Bakat</h3>
                        <p class="text-4xl font-bold text-yellow-500 mt-2">{{ $totalMinatBakat }}</p>
                    </div>

                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300">Total Jurusan</h3>
                        <p class="text-4xl font-bold text-orange-500 mt-2">{{ $totalJurusan }}</p>
                    </div>
                </section>

                <!-- Charts Section -->
                <section class="p-6 grid grid-cols-1 lg:grid-cols-2 gap-6">
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Users Statistics</h3>
                        <canvas id="usersChart"></canvas>
                    </div>
                    <div class="bg-white dark:bg-gray-800 shadow-md rounded-lg p-6">
                        <h3 class="text-lg font-semibold text-gray-700 dark:text-gray-300 mb-4">Earnings Statistics</h3>
                        <canvas id="earningsChart"></canvas>
                    </div>
                </section>
            </div>
        </div>

    </x-app-layout>
    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Users Chart
            const usersCtx = document.getElementById('usersChart').getContext('2d');
            new Chart(usersCtx, {
                type: 'bar',
                data: {
                    labels: ['Total Users', 'Verified', 'Unverified', 'Admin', 'Users'],
                    datasets: [{
                        label: 'Users Statistics',
                        data: [{{ $totalUsers }}, {{ $verifiedUsers }}, {{ $unverifiedUsers }}, {{ $adminUsers }}, {{ $userUsers }}],
                        backgroundColor: ['#3b82f6', '#10b981', '#ef4444', '#6366f1', '#8b5cf6']
                    }]
                }
            });

            // Earnings Chart
            const earningsCtx = document.getElementById('earningsChart').getContext('2d');
            new Chart(earningsCtx, {
                type: 'line',
                data: {
                    labels: ['Total Users', 'Verified', 'Unverified', 'Admin', 'Users'],
                    datasets: [{
                        label: 'Earnings',
                        data: [{{ $totalUsers }}, {{ $verifiedUsers }}, {{ $unverifiedUsers }}, {{ $adminUsers }}, {{ $userUsers }}],
                        borderColor: '#f59e0b',
                        fill: false
                    }]
                }
            });
        });

        feather.replace();
    </script>
</body>
</html>
