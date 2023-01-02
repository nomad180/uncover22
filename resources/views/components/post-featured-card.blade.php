  @props(['post'])
  <article class="transition-colors duration-300 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 sm:rounded-lg pb-8 mb-10">
    <div class="py-6 px-5 flex flex-col">
        <div>
            <a href="/posts/{{ $post->slug }}">
                <img src="{{ asset('storage/' . $post->thumbnail) }}" alt="Blog Post illustration" class="rounded-xl" width="100%">
            </a>
        </div>

        <div class="flex flex-col">
            <header class="mt-8">
                <div class="space-x-2">
                    <x-category-button :category="$post->category" />
                </div>

                <div class="mt-4">
                    <a href="/posts/{{ $post->slug }}">
                        <h1 class="text-3xl">
                            {{ $post->title }}
                        </h1>
                    </a>
                    <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $post->published_at->format('M d, Y') }}</time>
                        </span>
                </div>
            </header>

            <div class="text-sm mt-6">
                <p>
                    {{ $post->excerpt }}
                </p>
            </div>

            <footer class="flex justify-between items-center mt-8">
                <div class="flex items-center text-sm">
                    <h5 class="font-semibold">By
                        <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                    </h5>
                </div>

                <div>
                    <a href="/posts/{{ $post->slug }}"
                       class="transition-colors text-white duration-300 text-xs font-semibold bg-secondary hover:bg-primary rounded-full py-2 px-8"
                    >Read More</a>
                </div>
            </footer>
        </div>
    </div>
</article>
