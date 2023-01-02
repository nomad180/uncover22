@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-4 bg-secondary border border-transparent rounded-full text-white focus:bg-primary active:bg-primary transition ease-in-out duration-150'
            : 'text-secondary inline-flex items-center px-4  border-transparent rounded-full hover:text-white hover:bg-secondary transition ease-in-out duration-150';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
