<nav class="bg-white dark:bg-gray-900 border-b border-gray-200 dark:border-gray-700 shadow-sm">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">

            <!-- Left: Logo + Links -->
                <div class="hidden sm:flex items-center bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-white text-sm font-semibold px-3 py-1 rounded-full">
                <!-- Logo -->
                <a href="{{ route('reparations.index') }}" class="flex items-center">
                    <x-application-logo class="h-10 w-auto fill-current text-blue-600 dark:text-blue-400" />
                    <span class="ml-2 font-bold text-gray-800 dark:text-gray-200 text-lg">Réparations</span>
                </a>

                <!-- Navigation Links -->
                <div class="hidden sm:flex items-center bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-white text-sm font-semibold px-3 py-1 rounded-full">
                    <x-nav-link :href="route('reparations.index')" :active="request()->routeIs('reparations.index')">
                        {{ __('Accueil') }}
                    </x-nav-link>

                    
                </div>
            </div>

            <!-- Right: Stats + User -->
            <div class="flex items-center space-x-4">

                <!-- Badge total réparations -->
                <div class="hidden sm:flex items-center bg-blue-100 dark:bg-blue-800 text-blue-800 dark:text-white text-sm font-semibold px-3 py-1 rounded-full">
                    Total : {{ $total ?? 0 }}
                </div>

                <!-- User Dropdown -->
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="flex items-center text-sm font-medium text-gray-600 dark:text-gray-200 hover:text-gray-800 dark:hover:text-white focus:outline-none transition duration-150">
                            <span>{{ Auth::user()->name }}</span>
                            <svg class="ml-1 h-4 w-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                            </svg>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <!-- Logout -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                onclick="event.preventDefault(); this.closest('form').submit();">
                                {{ __('Se déconnecter') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>

            </div>
        </div>
    </div>
</nav>
