@props(['posts'])

@if ($posts->count(1)>0)
    @foreach ($posts as $post)
        <x-post-card :post="$post" class="{{ $loop->iteration <4 ? 'md:w-1/3 ml-4' : 'hidden' }}"/>
    @endforeach
@endif


