@section('title'){{$post->title}}@endsection
@section('description'){{$post->excerpt}}@endsection
@section('author'){{$post->author->name}}@endsection
<x-layout>
    @include ('posts.posts-header')
    <div class="flex flex-col md:flex-row px-4 md:px-8 lg:px-16 xl:px-32">
        <div class="md:w-5/6">
            <section>
                <main class="mx-auto p-6 space-y-6">
                    <div class="flex justify-between border-b border-primary">
                        <h1 class="text-3xl lg:text-4xl mt-6">{{ $post->title }} </h1>
                        <div>
                            <x-search></x-search>
                        </div>
                    </div>
                    <div class="flex justify-start">
                        <div class="ml-3 text-left mt-0.5">
                            By <a class="text-black no-underline" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                        </div>
                        <div>
                            <p class="pl-6 text-gray-400 text-sm mt-1">
                                Published <time>{{ $post->published_at->format('M d, Y') }} </time>
                            </p>
                        </div>
                        <div class="pl-6">
                            <x-category-button :category="$post->category" />
                        </div>
                    </div>
                    <!--{{ asset('storage/' . $post->thumbnail) }}-->
                    <div class="flex justify-center"><img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->alt }}" class="rounded-xl"></div>
                    <article class="max-w-6xl mx-auto lg:grid lg:grid-cols-12 gap-x-10">
                        <div class="col-span-12">
                            <div class="space-y-4 lg:text-lg leading-loose">
                                <p>
                                    {!! $post->body !!}
                                </p>
                            </div>
                        </div>
                    </article>
                </main>
            </section>
            <div class="flex justify-center mb-20">
                <p class="inline-flex items-center py-2 px-4 mb-4 border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary rounded-full text-white text-xl"><a class="text-white no-underline"  href="/blog" >Back to Latest Posts</a></p>
            </div>
        </div>
        <div class="flex flex-col md:ml-4 md:w-1/6">
                <div>
                    <div class="md:mt-14 flex justify-center text-secondary text-xl underline font:semi-bold">Uncover Your Fit Coaching</div>
                    <div class="flex justify-center">
                        <div class="py-2 flex justify-center w-1/2 lg:w-full">
                             <a href="/"><img src="/images/coachingtm3.jpg" class="rounded-xl shadow-xl shadow-zinc-400 border-2 border-primary" alt="A midlife woman sitting on couch having coaching session on computer"></a>
                        </div>
                    </div>
                    <button class="flex justify-center w-full text-base">
                        <a href="/" class="inline-flex items-center py-2 px-4 text-xs border-2 border-zinc-300 hover:bg-primary shadow-lg shadow-zinc-400 bg-secondary no-underline rounded-full text-white">Explore Coaching</a>
                    </button>
                </div>
                 <div>
                    <div class="mt-4 flex justify-center text-secondary text-xl underline">Affiliate Websites</div>
                    <div class="font-bold py-2 ml-4 italic">The ads below take you to partner websites that sell products many of you might find helpful in your health and fitness journey. If you click on one of the ads and make a purchase, Uncover Your Fit will receive a small commission at no extra cost to you.</div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1020318&amp;u=2872412&amp;m=68998&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/68998/Cross_Training_160x600.jpg" border="0" alt="Cross training gear" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2218536&amp;u=2872412&amp;m=85045&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/85045/45OFFPresentation169.jpg" border="0" alt="Naturevibe Botanicals"/></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=1882082&amp;u=2872412&amp;m=114867&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/114867/image_from_ios-1.jpg" border="0" alt="Keto Krisp Almond Butter Blackberry Jelly" /></a>
                    </div>
                    <div class="py-6 flex justify-center">
                        <a target="_blank" href="https://shareasale.com/r.cfm?b=2114834&amp;u=2872412&amp;m=78253&amp;urllink=&amp;afftrack="><img class="rounded-xl" src="https://static.shareasale.com/image/78253/3_NakedCookie-Choco-Chip_AdDesktop_130.jpg" border="0" alt="Nutrition With Nothing To Hide" /></a>
                    </div>
                </div>
            </div>
    </div>
<x-explore/>
</x-layout>
