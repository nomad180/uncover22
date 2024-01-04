  @props(['post'])
  <article class="transition duration-1000 hover:border hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 sm:rounded-lg pb-8 mb-10">
    <div class="py-6 px-5 flex flex-col">
        <div>
            <a href="/posts/{{ $post->slug }}">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="{{ $post->alt }}" class="rounded-xl" width="100%">
            </a>
        </div>

        <div class="flex flex-col">
            <header class="mt-8">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <a class="text-black no-underline" href="/posts/{{ $post->slug }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>
                    <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $post->published_at->format('M d, Y') }}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-6 leading-7">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <h5 class="font-semibold">By
                        <a class="text-black no-underline" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h5>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors text-white duration-300 text-xs font-semibold bg-secondary hover:bg-primary border-2 border-zinc-300 shadow-lg shadow-zinc-400 rounded-full py-2 px-4 no-underline"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
