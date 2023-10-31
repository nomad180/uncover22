@props(['active'])

@php
$classes = ($active ?? false)
            ? 'text-primary px-4 text-base hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-white focus:bg-secondary hover:text-white focus:text-white rounded-full'
            : 'text-secondary px-4 text-base hover:bg-secondary hover:border-2 hover:border-zinc-300 hover:shadow-lg hover:shadow-zinc-400 hover:text-whitefocus:bg-secondary hover:text-white focus:text-white rounded-full';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
