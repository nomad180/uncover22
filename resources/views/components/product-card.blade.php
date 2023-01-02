 @props(['product'])
  <article
        {{ $attributes->merge(['class' => 'transition-colors duration-300 flex hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
        <div class="py-6 px-5 flex flex-col">
            <div>
                <img src="{{ asset('storage/' . $product->thumbnail) }}" class="rounded-xl">
            </div>

            <div class="mt-8 flex flex-col flex-1">
                <header>
                    <div class="mt-4">
                        <a href="/dashboard">
                            <p class="text-sm font-semibold">
                                 {{ $product->name }}
                            </p>
                        </a>
                    </div>
                    <div class="flex items-center text-sm">
                    <h5 class="font-semibold">Price: ${{ $product->price }}</h5>
                </div>
                </header>
                    <div class="text-sm mt-6">
                        <p>
                            {!! $product->description !!}
                        </p>
                    </div>
            </div>
        </div>
    </article>
