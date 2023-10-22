@section('title'){{'Uncover Your Fit | Premier Health Coaching'}}@endsection
@section('description'){{'Are you a midlife warrior who is ready to become fit and stay that way? If so, our premier health coaching will help you ditch fads and live a healthier life.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
    <div class="mb-8 mt-10 md:mt-20 lg:mt-32 xl:mt-44 px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="mt-2 flex flex-col md:flex-row">
            <div class="w-full md:w-6/12 flex justify-center flex-col">
                <h1 class="text-5xl 2xl:text-7xl !important">Unlock your untapped potential and reveal the best version of you</h1>
                <p class="text-lg xl:text-xl mt-4">Premier 1-on-1 health coaching for midlife warriors seeking to  ditch fads, embrace sustainable wellness, and create the life they love waking up to</p>
                <div class="w-1/2 mt-10">
                    <a href="/coaching" class="text-sm xl:text-xl px-4 py-2 bg-secondary inline-flex items-center text-white hover:bg-primary hover:scale-105 rounded-full">Explore Coaching
                    </a>
                </div>
            </div>
            <div class="w-full md:w-1/3 mx-auto mt-6 md:mt-0 flex items-center justify-center">
                <img class="rounded-xl" src="/images/middleage4.jpg" alt="A collage of four images: a bowl of yogurt with berries on top, a man jogging, a woman sitting on the beach drinking coffee, and a woman holding a bowl of freshly cleaned vegetables"  >
            </div>
        </div>
    </div>
    <div class="px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="mt-2 md:mt-10 lg:mt-16 xl:mt-24 2xl:mt-44 flex flex-col-reverse md:flex-row pages">
            <div class="md:w-1/2 mt-6 md:mr-6 md:mt-0 flex items-center justify-center">
                <img class="rounded-xl shadow-lg shadow-secondary" src="/images/journey.jpg" alt="A person holding a compass">
            </div>
            <div class="mx-auto md:w-1/2 pages">
                <h2 class="text-5xl 2xl:text-7xl text-center mt-2 handwriting2">Our Philosophy</h2>
                <p>Your health journey is all about the habits you build, and Uncover Your Fit is here to help you construct a healthier future, brick by brick. We're not about quick fixes but rather the enduring transformation of your life. Our approach is rooted in habit-based health coaching, where we start small, nurturing your habits until they grow into lasting change.</p>
                <p>Say goodbye to crash-and-burn cycles; we're all about the slow, sustainable burn. So, whether you've tried countless fad diets or sprints in the marathon of health and fitness, Uncover Your Fit is here to act as your compass and guide you toward a healthier, more fulfilling life, one habit at a time.</p>
                <div class="flex justify-center w-full text-sm">
                    <a href="/about" class="hover:scale-105 inline-flex items-center py-2 px-8 pb-3 bg-secondary rounded-full text-white hover:bg-primary">Read More About Our Philosophy</a>
                </div>
            </div>
        </div>
        <h2 class="mt-16 xl:mt-24 2xl:mt-44 text-5xl 2xl:text-7xl text-center handwriting2">Benefits of Premier Health Coaching</h2>
        <div class="flex flex-col md:flex-row flex-wrap md:mt-8">
            <div class="flex md:w-1/3 mb-6 md:px-4 bg-yellow-100">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/6" src="/images/foodpyramid.jpg" alt="A food pyramid illustration" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Balanced Nutrition</h3>
                    <p class="text-left">Ever felt like a tightrope walker trying to balance your diet? Health coaching can guide you to find the perfect equilibrium. It's like becoming a culinary acrobat, perfectly juggling carbs, proteins, and fats.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4 bg-red-100">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/6" src="/images/heart.jpg" alt="A heart illustration" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Improved Health Markers</h3>
                    <p class="text-left">Picture your health markers as scorecards in a game. Coaching can help improve those scores - lower blood pressure, better cholesterol, healthier weight. It's like seeing your bowling score jump from gutter balls to strikes.</p>
                </div>
            </div>
            <div class="flex md:w-1/3 mb-6 md:px-4">
                <div class="transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 rounded-lg pb-8 mb-10 p-4">
                    <div class="flex justify-center"><img class="w-1/6" src="/images/stressreduction.jpg" alt="An illustration of a person sitting in a chair destressing" width="100%"></div>
                    <h3 class="text-secondary text-center font-semibold">Stress Reduction</h3>
                    <p class="text-left">Ah, the Zen zone! Health coaching equips you with strategies to master stress. It's like having a personal meditation guru on speed dial, helping you find tranquility in life's chaos.</p>
                </div>
            </div>
            <div class="flex justify-center w-full text-2xl">
                <a href="/coaching" class="hover:scale-105 inline-flex items-center py-2 px-8 pb-3 bg-secondary rounded-full text-white hover:bg-primary">Explore Coaching</a>
            </div>
        </div>
    </div>
    <div class="px-4 md:px-8 lg:px-16 xl:px-32 mb-4 pt-0 mt-0 mb-16">
        <h2 class="mt-16 xl:mt-24 2xl:mt-44 mb-16 text-5xl 2xl:text-7xl text-center handwriting2">Latest Blog Posts</h2>
        <div class="flex flex-col md:flex-row flex-wrap pt-4 md:px-4 bg-red-100">
           @if ($posts->count())
           <x-post-grid-index :posts="$posts"/>
           @else
                <p class="text-center mt-6 w-full">No posts yet. Please check back later.</p>
            @endif
        </div>
         <div class="flex justify-center w-full text-2xl">
            <a href="blog" class="hover:scale-105 inline-flex items-center py-2 px-8 bg-secondary rounded-full text-white hover:bg-primary">See More Posts</a>
        </div>
    </div>
    <!-- Calendly badge widget begin -->
    <link href="https://assets.calendly.com/assets/external/widget.css" rel="stylesheet">
    <script src="https://assets.calendly.com/assets/external/widget.js" type="text/javascript" async></script>
    <script type="text/javascript">window.onload = function() { Calendly.initBadgeWidget({ url: 'https://calendly.com/uncover_your_fit', text: 'Schedule Coaching Discovery Call', color: '#354b75', textColor: '#ffffff', branding: true }); }</script>
    <!-- Calendly badge widget end -->
</x-layout>
