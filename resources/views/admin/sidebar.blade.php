<!-- Sidebar -->
<div 
    :class="open ? 'w-64' : 'w-16'" 
    class="bg-white dark:bg-gray-800 shadow-lg fixed top-0 left-0 h-full z-50 transition-all duration-300"
>
    <!-- Header Sidebar -->
    <div class="px-6 py-4 flex items-center justify-between">
        <h2 
            :class="open ? 'block' : 'hidden'" 
            class="text-lg font-bold text-gray-800 dark:text-gray-200"
        >
            Admin Dashboard
        </h2>
        <button @click="open = !open" class="text-gray-600 dark:text-gray-200 focus:outline-none">
            <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'" class="text-2xl"></i>
        </button>
    </div>

    <!-- Navigation -->
    <nav class="mt-6">
        <ul>
            <!-- Dashboard -->
            <li class="my-2">
                <a href="{{ route('admin.dashboard') }}"
                   class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-gray-300 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-house text-xl mr-2"></i>
                    <span :class="open ? 'block' : 'hidden'">Dashboard</span>
                </a>
            </li>

            <!-- Penyakit -->
            <li class="my-2">
                <a href="{{ route('admin.minat_bakat.index') }}"
                   class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 
                   {{ request()->routeIs('admin.penyakit') ? 'bg-gray-300 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-virus text-xl mr-2"></i>
                    <span :class="open ? 'block' : 'hidden'">Minat Bakat</span>
                </a>
            </li>

            <!-- Gejala -->
            <li class="my-2">
                <a href="{{ route('admin.jurusan.index') }}"
                   class="flex items-center px-4 py-2 text-gray-600 dark:text-gray-200 hover:bg-gray-200 dark:hover:bg-gray-700 transition-colors duration-200 
                   {{ request()->routeIs('admin.gejala') ? 'bg-gray-300 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-stethoscope text-xl mr-2"></i>
                    <span :class="open ? 'block' : 'hidden'">Jurusan</span>
                </a>
            </li>

        </ul>
    </nav>
</div>
