@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-primary px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full'
            : 'text-secondary px-4 text-base hover:bg-secondary focus:bg-secondary hover:text-white focus:text-white rounded-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
