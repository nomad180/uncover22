<nav x-data="{ open: false }" class="border-b border-zinc-300 lg:border-none lg:mb-12 xl:mb-14 2xl:mb-16">
    <div id="navbar" class="w-full px-4 md:px-6 flex -mt-6 lg:-mt-0 lg:fixed lg:z-50 lg:top-0 lg:border-b lg:border-zinc-300 lg:bg-white">
        <!-- Hamburger -->
        <div class="pt-6 flex items-center lg:hidden">
            <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-secondary hover:text-white hover:bg-secondary focus:outline-none focus:bg-secondary focus:text-white transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>
        <div class="w-full lg:w-1/12 pt-6 pb-2 pr-10 lg:pr-0 lg:pt-2">
            <a href="/">
                <img src="/images/UYFLogo3.svg" alt="Uncover Your Fit Logo" class="w-1/4 lg:w-full m-auto">
            </a>
        </div>
        <menu class="w-full lg:w-9/12 hidden lg:flex justify-center m-auto">
            <x-dropdown-link :href="route('index')" :active="request()->routeIs('index')">Home</x-dropdown-link>
            <x-dropdown-link :href="route('about')" :active="request()->routeIs('about')">About</x-dropdown-link>
            <x-dropdown-link :href="route('contact')" :active="request()->routeIs('contact')">Contact</x-dropdown-link>
            <x-dropdown-link :href="route('blog')" :active="request()->routeIs('blog', 'show')">Blog</x-dropdown-link>
            @if (Route::has('login'))
            <div class="hidden">
                @auth
                    <x-dropdown-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">My UYF<!--Welcome, {{ Auth::user()->name }}--></x-dropdown-link>
                   <!-- <a href="{{ url('/dashboard') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Dashboard</a> -->
                @else
                    <x-dropdown-link :href="route('login')" :active="request()->routeIs('login')">Members</x-dropdown-link>

                   <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Register</a>
                    @endif-->
                @endauth
            </div>
            @endif
        </menu>
        <div class="hidden lg:flex justify-end m-auto">
            <a href="https://my.practicebetter.io/#/signin" class="text-sm xl:text-xl px-4 py-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 no-underline bg-secondary text-white rounded-full text-center" target="blank">
                Member Portal
            </a>
        </div>
    </div>
    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="bg-white border-b border-t border-secondary/50 absolute top-30 left-0 z-10 w-full hidden lg:hidden">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('index')" :active="request()->routeIs('index')">
                {{ __('Home') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('about')" :active="request()->routeIs('about')">
                {{ __('About') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('contact')" :active="request()->routeIs('contact')">
                {{ __('Contact Us') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('blog')" :active="request()->routeIs('blog')">
                {{ __('Blog') }}
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
                    <div class="block w-full px-4 py-2 text-left text-sm leading-5 hover:bg-secondary focus:outline-none transition duration-150 ease-in-out"><a class="text-secondary hover:text-white no-underline" href="https://uncoveryourfit.practicebetter.io/#/signin" target="blank">Member Portal</a></div>

                   <!-- @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="text-secondary py-1 px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full">Register</a>
                    @endif-->
                @endauth
             @endif
        </div>
    </div>
</nav>
