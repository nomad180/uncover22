 @props(['post'])
  <article
        {{ $attributes->merge(['class' => 'transition duration-1000 hover:border hover:border-secondary/30 hover:shadow-lg hover:shadow-secondary/50 rounded-lg pb-8 mb-10 p-4']) }}>
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
                        <a href="/posts/{{ $post->slug }}">
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

                <footer class="flex justify-between md:flex-col lg:flex-row lg:justify-between mt-8">
                    <div class="flex text-sm">
                        <div>
                            <h5 class="font-semibold">By
                                <a href="/blog?author={{ $post->author->username }}">{{ $post->author->name }}</a>
                            </h5>
                        </div>
                    </div>
                    <div class="mt-0 sm:mt-6 md:mt:6 lg:mt-0">
                        <a href="/posts/{{ $post->slug }}"
                           class="transition-colors text-white duration-300 text-xs font-semibold bg-secondary hover:bg-primary rounded-full py-2 px-8"
                        >Read More</a>
                    </div>
                </footer>
            </div>
        </div>
    </article>
