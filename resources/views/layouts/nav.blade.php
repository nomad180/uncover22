<nav class="border-b border-secondary">
    <div class="w-full px-4 md:px-6 flex">
        <menu class="w-1/3">
            <div class="pt-6 text-secondary"><a  href="/" class="hover:text-primary hover:font-semibold">Home</a></div>
        </menu>
        <div class="md:pl-10 md:pr-10 lg:pl-20 lg:pr-20 xxl:pl-32 xxl:pr-32 xxxl:pl-32 xxxl:pr-40 xxxxl:pl-48 xxxxl:pr-48 w-5/6 sm:w-1/2 xl:w-1/3 ">
            <a href="/">
                <img src="/images/UYFlogotext.svg" alt="Uncover Your Fit Logo">
            </a>
        </div>
        <div class="w-1/3">
        @if (Route::has('login'))
            <div class="text-right pt-6 ">
                @auth
                    <a href="{{ url('/profile') }}" class="text-sm text-secondary hover:text-primary hover:font-semibold">Welcome, {{ Auth::user()->name }}</a>
                    <a href="{{ url('/dashboard') }}" class="text-sm text-secondary px-4 hover:text-primary hover:font-semibold">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-secondary hover:text-primary hover:font-semibold">Log in</a>

                    @if (Route::has('register'))
                        <a href="{{ route('register') }}" class="ml-4 text-secondary hover:text-primary hover:font-semibold">Register</a>
                    @endif
                @endauth
            </div>
        @endif
        </div>
    </div>
</nav>
