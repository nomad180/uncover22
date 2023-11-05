@props(['active' => false])
@php
    $classes = 'inline-flex items-center text-secondary px-4 text-base no-underline hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-white focus:text-white rounded-full border-2 border-white shadow-lg shadow-white';
    if ($active) $classes = 'inline-flex items-center px-4 text-base no-underline text-primary font-semibold hover:font-normal hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-white rounded-full border-2 border-white shadow-lg shadow-white';
@endphp
<a {{ $attributes(['class' => $classes]) }}>
{{ $slot }}</a>
