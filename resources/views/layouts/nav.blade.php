<nav x-data="{ open: false }" class="border-b border-secondary/50">
    <div class="w-full px-4 md:px-6 flex pb-2">
        <menu class="w-1/3 hidden lg:flex">
            <div class="pt-6">
                <x-main-nav-link :href="route('index')" :active="request()->routeIs('index')">Home</x-main-nav-link>
                <x-main-nav-link :href="route('blog')" :active="request()->routeIs('blog', 'show')">Blog</x-main-nav-link>
                <x-main-nav-link :href="route('about')" :active="request()->routeIs('about')">About</x-main-nav-link>
                <x-main-nav-link :href="route('program')" :active="request()->routeIs('program')">Program</x-main-nav-link>
            </div>
        </menu>
        <div class=" md:pl-10 md:pr-10 lg:pl-20 lg:pr-20 xxl:pl-32 xxl:pr-32 xxxl:pl-32 xxxl:pr-40 xxxxl:pl-48 xxxxl:pr-48 w-full lg:w-1/3 pt-5 xl:pt-0">
            <a href="/">
                <img src="/images/UYFlogotext.svg" alt="Uncover Your Fit Logo">
            </a>
        </div>
        <div class="w-1/3 hidden lg:flex justify-end">
        @if (Route::has('login'))
            <div class="text-right pt-6 ">
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-secondary px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">My UYF<!--Welcome, {{ Auth::user()->name }}--></a>
                   <!-- <a href="{{ url('/dashboard') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Dashboard</a> -->
                @else
                    <a href="{{ route('login') }}" class="text-secondary px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Log In</a>

                   <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Register</a>
                    @endif-->
                @endauth
            </div>
        @endif
        </div>
    </div>
    <!-- Hamburger -->
    <div class="-mr-2 ml-2 mb-2 flex items-center lg:hidden">
        <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-gray-200 absolute top-40 left-0 z-10 w-full hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('program')" :active="request()->routeIs('program')">
                {{ __('Program') }}
            </x-responsive-nav-link>
            @if (Route::has('login'))
                @auth
                    <x-responsive-nav-link :href="route('dashboard')">
                        {{ __('MyUYF') }}
                    </x-responsive-nav-link><!--Welcome, {{ Auth::user()->name }}-->
                   <!-- <a href="{{ url('/dashboard') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Dashboard</a> -->
                @else
                    <x-responsive-nav-link :href="route('login')">
                        {{ __('Log In') }}
                    </x-responsive-nav-link>

                   <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Register</a>
                    @endif-->
                @endauth
             @endif
        </div>
    </div>
</nav>
