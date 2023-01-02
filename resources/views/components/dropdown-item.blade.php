@props(['active' => false])
@php
    $classes = 'inline-flex items-center text-secondary px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full';
    if ($active) $classes = 'inline-flex items-center px-4 text-base bg-secondary text-white rounded-full';
@endphp
<a {{ $attributes(['class' => $classes]) }}>
{{ $slot }}</a>
