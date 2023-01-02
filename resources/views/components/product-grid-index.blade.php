@props(['products'])

@if ($products->count(1)>0)
    @foreach ($products as $product)
        <x-product-card :product="$product" class="{{ $loop->iteration <4 ? 'md:w-1/3' : 'hidden' }}"/>
    @endforeach
@endif
