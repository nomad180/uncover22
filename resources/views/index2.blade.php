@section('title'){{'Uncover Your Fit | Premier Health Coaching'}}@endsection
@section('description'){{'Are you a midlife warrior who is ready to become fit and stay that way? If so, our premier health coaching will help you ditch fads and live a healthier life.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
     <div class="mb-8 mt-4 px-8 lg:hidden">
        <div class="mt-2 flex flex-col md:flex-row">
            <div class="w-full md:w-6/12 flex justify-center flex-col">
                <h1 class="text-5xl leading-tight lg:text-7xl lg:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center text-center lg:text-left">Premier health coaching for midlife warriors</h1>
                <h2 class="text-lg xl:text-xl mt-4">Ditch fads, embrace sustainable wellness, and get in the best shape of your life with our premier 1-on-1 health coaching</h2>
                <div class="w-1/2 mt-10">
                    <a href="/coaching" class="text-sm xl:text-xl px-4 py-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white no-underline rounded-full text-center inline-flex items-center">Explore Coaching
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/2 mx-auto mt-6 md:mt-0 md:ml-4 flex items-center justify-center">
                <div class="mx-auto mt-6 md:mt-0 flex items-center justify-center">
                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" src="/images/indextm5.jpg" alt="A collage of five images: an Asian man stretching, a man jogging in the mountains, a woman getting her music ready to work out in gym, a black male doing dips in the park, and a man and woman making a healthy meal"  >
                </div>
            </div>
        </div>
    </div>
    <div class="relative mt-6 lg:-mt-12 xl:-mt-14 2xl:-mt-20 mb-6 lg:-mb-16 xl:-mb-24 2xl:-mb-32 hidden lg:flex">
        <video width="100%" height="100%" autoplay muted loop playsinline>
            <source src="/images/indexnew7.mp4" type="video/mp4">
        </video>
        <div class="absolute inset-y-0 inset-x-4 md:inset-x-16 lg:inset-x-24 xl:inset-x-32 w-5/12 flex justify-center flex-col">
            <h1 class="lg:text-6xl lg:leading-tight xl:text-7xl xl:leading-tight 2xl:text-8xl 2xl:leading-tight handwriting6 flex justify-center">Premier health coaching for midlife warriors</h1>
            <h2 class="lg:text-xl mt-4 pr-4">Ditch fads, embrace sustainable wellness, and get in the best shape of your life with our premier 1-on-1 health coaching</h2>
            <div class="mt-10">
                <a href="/coaching" class="text-sm xl:text-xl px-4 py-2 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white no-underline rounded-full text-center inline-flex items-center">Explore Coaching
                </a>
            </div>
        </div>
    </div>
    <div>
        <div class="px-4 md:px-8 lg:px-16 xl:px-32 mb-4 pt-0 mt-0 mb-16">
            <div class="mt-2 md:mt-10 lg:mt-16 xl:mt-24 2xl:mt-32 flex flex-col-reverse lg:flex-row pages transition duration-1000 hover:border hover:border-zinc-300 hover:bg-neutral-50 hover:shadow-lg hover:shadow-zinc-400 rounded-lg p-6">
                <div class="lg:w-1/2 mt-6 xl:mt-8 md:mr-6 flex justify-center lg:self-start">
                    <img class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" src="/images/journey.jpg" alt="A person holding a compass">
                </div>
                <div class="mx-auto lg:w-1/2 pages">
                    <h2 class="text-5xl 2xl:text-7xl text-center mt-2 handwriting6">The march of time</h2>
                    <p>As the years pile up like unread emails in your inbox, it can feel like maintaining your health is a losing battle:</p>
                    <ul>
                        <li class="my-2">Your metabolism slows down, making those extra pounds seem as clingy as your old ex on social media.</li>
                        <li class="my-2">Your muscles? Well, they're pulling a disappearing act, vanishing by 3% to 8% each decade after the big 3-0.</li>
                        <li class="my-2">Energy? It's become as elusive as that sock you lost in the laundry.</li>
                        <li class="my-2">And let's not forget those New Year's resolutions&mdash;they tend to vanish faster than a snowflake in July. </li>
                    </ul>
                    <p>But fear not, Uncover Your Fit is here to act as your compass and guide you to a healthier life. We're all about building lasting habits through habit-based health coaching. Think of it as constructing a strong fortress of health, one brick at a time. Join us on this journey to a healthier, happier you!</p>
                    <div class="flex justify-center w-full text-sm">
                        <a href="/about" class="py-2 px-8 pb-3 border-2 no-underline border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Learn More About Us</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="px-4 md:px-8 lg:px-16 xl:px-32 mb-4 pt-0 mt-0 mb-16">
        <div class="m-10 lg:mx-40 p-6 pages">
            <h2 class="text-5xl leading-tight 2xl:text-7xl 2xl:leading-tight text-center handwriting6">Don't wait any longer!</h2>
            <p class="text-3xl xl:text-5xl mt-4 text-center"> Give yourself the opportunity to create the life you'll love waking up to!</p>
            <div class="flex justify-center w-full text-2xl mt-6">
                <a href="/coaching" class="py-2 px-8 pb-3 border-2 no-underline border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary text-white rounded-full text-center inline-flex items-center">Explore Coaching</a>
            </div>
        </div>
    </div>
    <x-accordion/>
    <x-explore/>
</x-layout>
