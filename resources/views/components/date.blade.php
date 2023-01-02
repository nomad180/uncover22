@props(['date'])

@php
    if (date('m/d/Y') >= auth()->user()->created_at->modify('next sunday')->format('m/d/Y')){
        $classes = '';
    } else {
        $classes = 'hidden';
    }
@endphp
<div {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</div>

<!--auth()->user()->created_at->modify('next thursday')->format('m/d/Y'))-->
