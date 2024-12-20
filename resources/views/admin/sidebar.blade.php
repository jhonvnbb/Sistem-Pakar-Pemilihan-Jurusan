<!-- Sidebar -->
<div 
    :class="open ? 'w-64' : 'w-16'" 
    class="bg-gradient-to-r from-indigo-500 via-purple-600 to-pink-600 dark:bg-gradient-to-r dark:from-gray-700 dark:to-gray-800 shadow-lg fixed top-0 left-0 h-full z-50 transition-all duration-300 overflow-hidden"
>
    <!-- Header Sidebar -->
    <div class="px-6 py-4 flex items-center justify-between">
        <h2 
            :class="open ? 'block' : 'hidden'" 
            class="text-2xl font-bold text-white tracking-wide transition-all duration-300"
        >
            Admin Panel
        </h2>
        <button @click="open = !open" class="text-white focus:outline-none">
            <i :class="open ? 'fa-solid fa-xmark' : 'fa-solid fa-bars'" class="text-2xl"></i>
        </button>
    </div>

    <hr>

    <!-- Navigation -->
    <nav class="mt-8">
        <ul>
            <!-- Dashboard -->
            <li class="my-3">
                <a href="{{ route('admin.dashboard') }}" 
                   class="flex items-center px-6 py-2 text-white hover:bg-indigo-700 dark:hover:bg-gray-700 transition-all duration-300 
                   {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-700 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-house text-xl mr-3 transition-transform duration-300"></i>
                    <span :class="open ? 'block' : 'hidden'">Dashboard</span>
                </a>
            </li>

            <!-- Minat Bakat -->
            <li class="my-3">
                <a href="{{ route('admin.minat_bakat.index') }}" 
                   class="flex items-center px-6 py-2 text-white hover:bg-indigo-700 dark:hover:bg-gray-700 transition-all duration-300 
                   {{ request()->routeIs('admin.minat_bakat.index') ? 'bg-indigo-700 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-virus text-xl mr-3 transition-transform duration-300"></i>
                    <span :class="open ? 'block' : 'hidden'">Minat Bakat</span>
                </a>
            </li>

            <!-- Jurusan -->
            <li class="my-3">
                <a href="{{ route('admin.jurusan.index') }}" 
                   class="flex items-center px-6 py-2 text-white hover:bg-indigo-700 dark:hover:bg-gray-700 transition-all duration-300 
                   {{ request()->routeIs('admin.jurusan.index') ? 'bg-indigo-700 dark:bg-gray-700 font-semibold' : '' }}">
                    <i class="fa-solid fa-stethoscope text-xl mr-3 transition-transform duration-300"></i>
                    <span :class="open ? 'block' : 'hidden'">Jurusan</span>
                </a>
            </li>
        </ul>
    </nav>

    <hr>

    <!-- Footer Sidebar -->
    <div class="absolute bottom-4 left-0 w-full px-6 py-2 text-center text-white text-sm">
        <p>&copy; <span :class="open ? '' : 'hidden'">2024 jhonvnbb</span></p>
    </div>
</div>
