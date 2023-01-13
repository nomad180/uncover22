@section('title'){{'Blog | Uncover Your Fit'}}@endsection
@section('description'){{'Are you ready to become fit and stay that way? If so, our premier online health coaching will help you get stronger, eat better, and live healthier.'}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
        @include ('posts.posts-header')
        <div class="flex flex-col md:flex-row px-4 md:px-8 lg:px-16 xl:px-32">
            <div class="md:w-5/6">
                <main class="max-w-8xl mx-auto mt-6 lg:mt-10 mb-6">
                    <div class="flex justify-between border-b border-primary mb-4">
                        @if (isset($currentCategory))
                        <h1 class="text-4xl mt-6 mb-2">{{ isset($currentCategory) ? ucwords($currentCategory->slug) : '' }} Posts
                            <a href="/blog" class="text-sm hover:text-primary">|Back to Latest Posts|</></a>
                        </h1>
                        @else
                        <h1 class="text-4xl mt-6 mb-2">Latest Posts</h1>
                        @endif
                        <div>
                            <x-search></x-search>
                        </div>
                    </div>
                    @if ($posts->count())
                        <x-posts-grid :posts="$posts"/>
                        {{ $posts->links('pagination::tailwind') }}
                    @else
                        <p class="text-center mt-6">No posts yet. Please check back later.</p>
                    @endif
                </main>
            </div>
            <div class="flex flex-col md:ml-10 md:w-1/6">
                <div>
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Program</div>
                    <div class="py-2 flex justify-center">
                        <img src="/images/UYFAdvert.jpg" class="rounded-xl border border-secondary">
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/program" alt="Multiple people in a pushup position on a gym floor with the text Uncover Your Fit" class="inline-flex items-center py-2 px-8 bg-secondary rounded-full text-white hover:bg-primary text-xs">Learn More</a>
                    </button>
                </div>
                 <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Links</div>
                    <div class="font-bold py-2">If you click on one of the links below and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you.</div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=947058&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/68998/yoga240x400.jpg" border="0" alt="yoga gear" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2218553&amp;u=2872412&amp;m=85045&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/85045/DisplayBanner1200x1200px.jpg" border="0" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1020318&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img src="https://static.shareasale.com/image/68998/Cross_Training_160x600.jpg" border="0" /></a>
                    </div>
                </div>
            </div>
        </div>
</x-layout>
