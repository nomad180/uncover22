 @props(['post'])
  <article
        {{ $attributes->merge(['class' => 'transition duration-1000 hover:border hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 rounded-lg pb-8 mb-10 p-4 mx-1']) }}>
        <div class="py-2 px-1 flex flex-col">
            <div>
                <a href="/posts/{{ $post->slug }}">
                    <img src="{{ asset('storage/' . $post->thumbnail) }}"  class="rounded-xl" alt="{{ $post->alt }}">
                </a>
            </div>

            <div class="mt-8 flex flex-col flex-1">
                <header>
                    <div class="space-x-2">
                        <x-category-button :category="$post->category" />
                    </div>

                    <div class="mt-4">
                        <a class="text-black no-underline" href="/posts/{{ $post->slug }}">
                        <p class="text-sm font-semibold">
                             {{ $post->title }}
                        </p>
                        </a>
                        <span class="mt-2 block text-gray-400 text-xs">
                            Published <time>{{ $post->published_at->format('M d, Y') }}</time>
                        </span>
                    </div>
                </header>

                <!--<div class="text-sm mt-4 flex-1">
                    <p>
                        {{ $post->excerpt }}
                    </p>
                </div>-->

                <footer class="flex justify-between md:flex-col 2xl:flex-row mt-8">
                    <div class="flex text-sm">
                        <div>
                            <h5 class="font-semibold">By
                                <a class="text-black no-underline" href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                    <div class="mt-0 sm:mt-6 md:mt:6 2xl:mt-0">
                        <a href="/posts/{{ $post->slug }}"
                           class="transition-colors text-white duration-300 text-xs font-semibold bg-secondary hover:bg-primary border-2 border-zinc-300 shadow-lg shadow-zinc-400 rounded-full py-2 px-4 no-underline"
                        >Read More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
