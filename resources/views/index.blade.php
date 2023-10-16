@section('title'){{'Uncover Your Fit | Premier Health Coaching'}}@endsection
@section('description'){{'Are you ready to become fit and stay that way? If so, our premier online health coaching will help you get stronger, eat better, and live healthier.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div class="relative">
        <video autoplay muted loop playsinline>
            <source src="/images/aa3.mp4" type="video/mp4">
        </video>
        <!--<img class="border-b border-secondary lg:min-h-screen" src="/images/index23.jpg" alt="Runner bending over to tie his shoe." width="100%">-->
        <div class="intro-overlay">
            <img src="/images/premiercoaching3.svg" alt="Premier Health Coaching - Are you ready to get fit and stay that way for the rest of your life? If so, step up to our one-year Uncover Your Fit program.">
        </div>
        <div id="button" class="uncover-button unbutton">
            <a id="home" href="/program">
                <img class="image_on" src="/images/learnmore8.svg" alt="Learn More">
                <img class="image_off" src="/images/learnmore9.svg" alt="Learn More">
            </a>
        </div>
    </div>
    <div class="px-4 md:px-8 lg:px-16 xl:px-32 pages">
        <h1 class="text-secondary text-center font-medium">Still unsure? Look at some of our program features below.</h1>
        <div class="flex flex-col md:flex-row flex-wrap md:mt-8">
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/habits2.png" alt="Text your daily routine matters" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Make Habits a Way of Life</h3>
                    <p class="text-left">Most people who try to get in shape overload themselves and burn out quickly. To avoid this, we help you focus on turning small practices into daily habits that eventually become part of your way of life and lead to big results.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/support2.png" alt="Text help, support, advice, guidance, and assistance" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Stay Accountable</h3>
                    <p class="text-left">Staying on track with any new fitness program is difficult. When you work with us, we provide you with ongoing support, guidance, and accountability every step of the way, no matter what life throws at you.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/goals2.png" alt="Text goals specific measurable achievable realistic and time based" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Develop SMART Goals</h3>
                    <p class="text-left">Many people’s goals are not Specific, Measurable, Achievable, Realistic, and Time based (SMART) and as a result, are rarely achieved. To ensure you actually achieve your goals, we'll teach you all about SMART goals.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/individual2.png" alt="A red person cutout surround by a lot of white person cutouts" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Keep Your Individuality</h3>
                    <p class="text-left">Our program utilizes a structured approach that is proven to develop sustainable healthy habits. At the same time, however, we recognize that you are an individual and as such, work with you to individualize your program.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/busy5.png" alt="Four business people working at a conference table" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Let Us do the Heavy Lifting</h3>
                    <p class="text-left">You’re a busy person, and we understand that you have enough to worry about already, so leave the fitness and nutrition details to us as you breathe easy. All you need to do is help us identify your preferences.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/3 md:w-1/2" src="/images/personalized2.png" alt="An athletic trainer holding a clipboard" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Receive Personalized Service</h3>
                    <p class="text-left">We realize that your training program needs to be personalized to your exact needs. For this reason, we keep our client list small, so that we can provide a custom level of support to each and every client.</p>
                </div>
            </div>
            <button class="flex justify-center w-full text-2xl">
                <a href="/program" class="inline-flex items-center py-2 px-8 pb-3 bg-secondary rounded-full text-white hover:bg-primary">Learn More</a>
            </button>
        </div>
    </div>
    <div class="px-4 md:px-8 lg:px-16 xl:px-32 mb-4 pt-0 mt-0 mb-16">
        <div class="flex pt-4">
            <div class="border-b-2 border-primary w-1/3 mb-6"></div>
            <div class="w-1/3 text-secondary text-center">
                <h1>Latest Blog Posts</h1>
            </div>
            <div class="border-b-2 border-primary w-1/3 mb-6"></div>
        </div>
        <div class="flex flex-col md:flex-row flex-wrap pt-4 ml-4">
           @if ($posts->count())
           <x-post-grid-index :posts="$posts"/>
           @else
                <p class="text-center mt-6 w-full">No posts yet. Please check back later.</p>
            @endif
        </div>
         <div id="button" class="flex justify-center w-full text-2xl">
            <a href="blog" class="inline-flex items-center py-2 px-8 bg-secondary rounded-full text-white hover:bg-primary">See More Posts</a>
        </div>
    </div>
</x-layout>
