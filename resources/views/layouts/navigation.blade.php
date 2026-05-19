<nav x-data="{ open: false }" class="bg-stone-950 border-b border-stone-800 sticky top-0 z-50">
    <!-- Primary Navigation Menu -->
    <div class="max-w-[1400px] mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-20">
            <div class="flex">
                <!-- Logo -->
                <div class="shrink-0 flex items-center">
                    <a href="{{ route('dashboard') }}" class="flex items-center gap-3 group">
                        <div class="w-10 h-10 bg-green-600 rounded-xl flex items-center justify-center shadow-lg shadow-green-600/20 group-hover:rotate-12 transition-transform">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1m-16 0H3m15.364-6.364l-.707.707M6.343 17.657l-.707.707m12.728 0l-.707-.707M6.343 6.343l-.707-.707M12 8a4 4 0 100 8 4 4 0 000-8z"></path></svg>
                        </div>
                        <span class="text-2xl font-bold text-white tracking-tight">Agro<span class="text-green-500">AI</span></span>
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ms-12 sm:flex">
                    @foreach([
                        ['route' => 'dashboard', 'label' => 'Dashboard'],
                        ['route' => 'crop.recommendation', 'label' => 'Crop Advisor'],
                        ['route' => 'pest.prediction', 'label' => 'Pest Guard'],
                        ['route' => 'irrigation.tips', 'label' => 'AquaFlow'],
                        ['route' => 'chatbot', 'label' => 'AI Chat']
                    ] as $link)
                    <a href="{{ route($link['route']) }}" class="inline-flex items-center px-1 pt-1 text-sm font-bold leading-5 transition duration-150 ease-in-out {{ request()->routeIs($link['route']) ? 'text-green-500 border-b-2 border-green-500' : 'text-stone-400 hover:text-white border-b-2 border-transparent hover:border-stone-700' }}">
                        {{ __($link['label']) }}
                    </a>
                    @endforeach
                </div>
            </div>

            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ms-6">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 py-2 border border-stone-800 text-sm leading-4 font-bold rounded-xl text-stone-300 bg-stone-900 hover:text-white hover:bg-stone-800 focus:outline-none transition ease-in-out duration-150">
                            <div class="flex items-center gap-2">
                                <div class="w-6 h-6 bg-green-600/20 rounded-full flex items-center justify-center">
                                    <span class="text-[10px] text-green-500">{{ substr(Auth::user()->name, 0, 1) }}</span>
                                </div>
                                {{ Auth::user()->name }}
                            </div>

                            <div class="ms-2">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        <x-dropdown-link :href="route('profile.edit')" class="dark:text-stone-300 dark:hover:bg-stone-800">
                            {{ __('Profile Settings') }}
                        </x-dropdown-link>

                        <!-- Authentication -->
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <x-dropdown-link :href="route('logout')"
                                    onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                    class="text-red-400 dark:hover:bg-red-900/10">
                                {{ __('Log Out') }}
                            </x-dropdown-link>
                        </form>
                    </x-slot>
                </x-dropdown>
            </div>

            <!-- Hamburger -->
            <div class="-me-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-xl text-stone-400 hover:text-white hover:bg-stone-900 focus:outline-none transition duration-150 ease-in-out">
                    <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                        <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden bg-stone-950 border-t border-stone-800">
        <div class="pt-2 pb-3 space-y-1">
            @foreach([
                ['route' => 'dashboard', 'label' => 'Dashboard'],
                ['route' => 'crop.recommendation', 'label' => 'Crop Advisor'],
                ['route' => 'pest.prediction', 'label' => 'Pest Guard'],
                ['route' => 'irrigation.tips', 'label' => 'AquaFlow'],
                ['route' => 'chatbot', 'label' => 'AI Chat']
            ] as $link)
            <x-responsive-nav-link :href="route($link['route'])" :active="request()->routeIs($link['route'])" class="dark:text-stone-300">
                {{ __($link['label']) }}
            </x-responsive-nav-link>
            @endforeach
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-stone-800">
            <div class="px-4 flex items-center gap-3">
                <div class="w-10 h-10 bg-green-600 rounded-full flex items-center justify-center text-white font-bold">
                    {{ substr(Auth::user()->name, 0, 1) }}
                </div>
                <div>
                    <div class="font-bold text-base text-white">{{ Auth::user()->name }}</div>
                    <div class="font-medium text-sm text-stone-500">{{ Auth::user()->email }}</div>
                </div>
            </div>

            <div class="mt-3 space-y-1 pb-4">
                <x-responsive-nav-link :href="route('profile.edit')" class="dark:text-stone-300">
                    {{ __('Profile Settings') }}
                </x-responsive-nav-link>

                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();"
                            class="text-red-400">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</nav>
