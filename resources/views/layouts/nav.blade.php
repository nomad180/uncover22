<nav x-data="{ open: false }" class="border-b border-secondary/50">
    <div class="w-full px-4 md:px-6 flex pb-2">
        <!-- Hamburger -->
        <div class="pt-6 flex items-center lg:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-secondary hover:text-white hover:bg-secondary focus:outline-none focus:bg-secondary focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <menu class="w-1/3 hidden lg:flex">
            <div class="hidden lg:flex">
                <x-dropdown align="left" width="48">
                    <x-slot name="trigger">
                        <button class="inline-flex items-center px-4 border-transparent rounded-full tracking-widest text-secondary hover:bg-secondary hover:text-white mt-6">
                            <div>Menu</div>

                            <div class="ml-1">
                                <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>
                    <x-slot name="content" class="text-primary">
                        <x-dropdown-link :href="route('index')" :active="request()->routeIs('index')">Home</x-dropdown-link>
                        <x-dropdown-link :href="route('blog')" :active="request()->routeIs('blog', 'show')">Blog</x-dropdown-link>
                        <x-dropdown-link :href="route('about')" :active="request()->routeIs('about')">About</x-dropdown-link>
                        <x-dropdown-link :href="route('program')" :active="request()->routeIs('program')">Program</x-dropdown-link>
                        <x-dropdown-link :href="route('contact')" :active="request()->routeIs('contact')">Contact Us</x-dropdown-link>
                    </x-slot>
                </x-dropdown>
            </div>
        </menu>
        <div class="pr-10 md:pl-10 md:pr-10 lg:pl-20 lg:pr-20 xxl:pl-32 xxl:pr-32 xxxl:pl-32 xxxl:pr-40 xxxxl:pl-48 xxxxl:pr-48 w-full lg:w-1/3 pt-5 xl:pt-0">
            <a href="/">
                <img src="/images/UYFlogotext.svg" alt="Uncover Your Fit Logo">
            </a>
        </div>
        <div class="w-1/3 hidden lg:flex justify-end">
        @if (Route::has('login'))
            <div class="text-right pt-6">
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

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-white border-b border-t border-secondary/50 absolute top-30 left-0 z-10 w-full hidden lg:hidden">
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
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            @if (Route::has('login'))
                @auth
                    @can('member')
                   <!--Welcome, {{ Auth::user()->name }}-->
                   <!-- <a href="{{ url('/dashboard') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Dashboard</a> -->
                    <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                    {{ __('Dashboard') }}
                    </x-responsive-nav-link>
                    <x-responsive-nav-link :href="route('uncoveryourfit')" :active="request()->routeIs('uncoveryourfit')">
                        {{ __('Uncover Your Fit') }}
                    </x-responsive-nav-link>
                    @endcan
                    @can('admin')
                    <x-responsive-nav-link href="/nova">
                        {{ __('Admin') }}
                    </x-responsive-nav-link>
                    @endcan
                    @can('member')
                    <x-responsive-nav-link :href="route('profile.edit')" :active="request()->routeIs('profile.edit')">
                    {{ __('Account Details') }}
                    </x-responsive-nav-link>
                    @endcan
                    @cannot('member')
                    <x-nav-link :href="route('charge')" :active="request()->routeIs('charge')">
                        {{ __('Uncover Your Fit Purchase') }}
                    </x-nav-link>
                    @endcan
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <x-responsive-nav-link :href="route('logout')"
                                onclick="event.preventDefault();
                                            this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </x-responsive-nav-link>
                    </form>
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
