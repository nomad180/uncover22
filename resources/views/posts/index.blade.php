@section('title'){{'Blog | Uncover Your Fit'}}@endsection
@section('description'){{"Uncover Your Fit's blog posts provide information that will help you get stronger, eat better, and live healthier."}}@endsection
@section('author'){{'Damon Leach'}}@endsection
<x-layout>
        @include ('posts.posts-header')
        <div class="flex flex-col md:flex-row px-4 md:px-8 lg:px-16 xl:px-32">
            <div class="md:w-5/6 mb-20">
                <main class="max-w-8xl mx-auto mt-6 lg:mt-10 mb-6">
                    <div class="flex justify-between border-b border-primary mb-4">
                        @if (isset($currentCategory))
                        <h1 class="text-4xl mt-6 mb-2">{{ isset($currentCategory) ? ucwords($currentCategory->slug) : '' }} Posts
                            <a href="/blog" class="text-sm text-black no-underline hover:text-primary">|Back to Latest Posts|</></a>
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
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Coaching</div>
                    <div class="flex justify-center">
                        <div class="py-2 flex justify-center w-1/2 lg:w-full">
                             <a href="/"><img src="/images/coachingtm3.jpg" class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
                        </div>
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/"  class="inline-flex items-center py-2 px-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary rounded-full text-white text-xs no-underline">Explore Coaching</a>
                    </button>
                </div>
                 <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Websites</div>
                    <div class="font-bold py-2 ml-4 italic">The ads below take you to partner websites that sell products many of you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you.</div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=947058&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/68998/yoga240x400.jpg" border="0" alt="yoga gear" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2218553&amp;u=2872412&amp;m=85045&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/85045/DisplayBanner1200x1200px.jpg" border="0" alt="Naturevibe Botanicals"/></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1892429&amp;u=2872412&amp;m=114867&amp;urllink=&amp;afftrack="><img  class="rounded-xl"src="https://static.shareasale.com/image/114867/pbcc_hero_720.png" border="0" alt="Keto Krisp Peanut Butter Chocolate Chunk" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2064734&amp;u=2872412&amp;m=78253&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/78253/F2B68092-CF7B-252E-7754DDABAF8521D6.jpg" border="0" alt="Nutrition With Nothing To Hide" /></a>
                    </div>
                </div>
            </div>
        </div>
<x-explore/>
</x-layout>
