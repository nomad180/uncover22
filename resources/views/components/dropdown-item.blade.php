@props(['active' => false])
@php
    $classes = 'inline-flex items-center text-secondary px-4 text-base hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-white focus:text-white rounded-full';
    if ($active) $classes = 'inline-flex items-center px-4 text-base text-primary hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-white rounded-full';
@endphp
<a {{ $attributes(['class' => $classes]) }}>
{{ $slot }}</a>
