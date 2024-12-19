<nav class="bg-gray-800 shadow-lg p-4 md:p-6 fixed top-0 left-0 w-full z-50">
    <div class="container mx-auto flex justify-between items-center">
        <!-- Logo -->
        <div>
            <x-application-logo class="w-auto h-10 fill-current text-white" />
        </div>

        <!-- Mobile Toggle Button -->
        <div class="md:hidden">
            <button onclick="toggleMenu()" class="text-white focus:outline-none hover:text-yellow-400 transition-transform transform hover:scale-110 duration-300">
                <i id="toggle-icon" class="fas fa-bars text-2xl"></i>
            </button>
        </div>

        <!-- Desktop Links -->
        <div class="hidden md:flex items-center space-x-8">
            <a href="/" class="text-white hover:text-yellow-400 transition-all duration-300 text-lg font-medium">Home</a>
            <a href="/#about" class="text-white hover:text-yellow-400 transition-all duration-300 text-lg font-medium">About</a>

            @auth 
            <a href="{{ route('diagnosa.index') }}" class="text-white hover:text-yellow-400 transition-all duration-300 text-lg font-medium">Diagnosa</a>
            @endauth

            @if (Route::has('login'))
                <div class="flex gap-4 items-center">
                    @auth
                    <div class="hidden sm:flex sm:items-center">
                        <x-dropdown align="right" width="48">
                            <x-slot name="trigger">
                                <button class="flex items-center px-3 py-2 border border-transparent rounded-lg text-gray-200 bg-gray-700 hover:bg-gray-600 focus:ring-2 focus:ring-yellow-500">
                                    <span class="mr-2">{{ Auth::user()->name }}</span>
                                    <i class="fas fa-chevron-down"></i>
                                </button>
                            </x-slot>
                            <x-slot name="content">
                                <x-dropdown-link :href="route('profile.edit')" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                    {{ __('Profile') }}
                                </x-dropdown-link>
                                <form method="POST" action="{{ route('logout') }}">
                                    @csrf
                                    <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="block w-full px-4 py-2 text-start text-sm leading-5 text-gray-700 dark:text-gray-300 hover:bg-gray-100 dark:hover:bg-gray-800 focus:outline-none focus:bg-gray-100 dark:focus:bg-gray-800 transition duration-150 ease-in-out">
                                        {{ __('Log Out') }}
                                    </x-dropdown-link>
                                </form>
                            </x-slot>
                        </x-dropdown>
                    </div>
                    @else
                    <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg shadow-md hover:bg-blue-700 hover:shadow-lg transition duration-300">
                        Log in
                    </a>
                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white font-medium rounded-lg shadow-md hover:bg-green-700 hover:shadow-lg transition duration-300">
                            Register
                        </a>
                    @endif
                    @endauth
                </div>
            @endif
        </div>

        <!-- Responsive Sidebar -->
        <div id="sidebar" class="fixed top-0 left-0 w-64 h-full bg-gradient-to-b from-gray-900 to-black p-6 z-50 transform -translate-x-full transition-transform duration-300 ease-in-out md:hidden flex flex-col">
            <button onclick="toggleMenu()" class="absolute top-4 right-4 text-white text-2xl focus:outline-none hover:text-yellow-400">
                <i class="fas fa-times"></i>
            </button>
            <div class="flex flex-col flex-grow space-y-4 mt-10 overflow-y-auto">
                <x-application-logo class="w-auto h-12 mb-4 fill-current text-white" />
                <hr class="border-gray-700">
                <a href="/" class="text-white hover:text-yellow-400 transition duration-300 text-lg">Home</a>
                <a href="/#about" class="text-white hover:text-yellow-400 transition duration-300 text-lg">About</a>
                <a href="/#faq" class="text-white hover:text-yellow-400 transition duration-300 text-lg">FAQ</a>
                @auth
                <x-dropdown-link :href="route('profile.edit')" class="text-white hover:text-yellow-400 transition duration-300 text-lg">
                    {{ __('Profile') }}
                </x-dropdown-link>
                @endauth
                <hr class="border-gray-700">

                @if (Route::has('login'))
                <div class="flex flex-col gap-4 mt-6">
                    @auth
                        <span class="text-white text-lg">Hi! <i>{{ Auth::user()->name }}</i></span>
                        <form method="POST" action="{{ route('logout') }}" class="w-full">
                            @csrf
                            <x-dropdown-link :href="route('logout')" onclick="event.preventDefault(); this.closest('form').submit();" class="flex items-center justify-center px-4 py-2 bg-red-600 text-white rounded-lg shadow-lg hover:bg-red-700 transition duration-300 text-center">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg shadow-lg hover:bg-blue-700 transition duration-300 text-center">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg shadow-lg hover:bg-green-700 transition duration-300 text-center">Register</a>
                        @endif
                    @endauth
                </div>
                @endif
            </div>
            <hr class="border-gray-700 mb-4">
            <footer class="mt-auto text-center text-gray-400 text-sm">
                &copy; 2024 ExpertSystem. All rights reserved.
            </footer>
        </div>
    </div>
</nav>

<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        const icon = document.getElementById('toggle-icon');
        const body = document.body;

        sidebar.classList.toggle('-translate-x-full');
        body.classList.toggle('overflow-hidden');

        icon.classList.toggle('fa-bars');
        icon.classList.toggle('fa-times');
    }
</script>
