@props(['lesson'])
@php
    Use Carbon\Carbon;
    $time = Carbon::now();
    $days = $lesson->drip_days;
    $dripDays = auth()->user()->created_at->next('sunday')->addDays($days);
    $dripDay = auth()->user()->created_at->next('sunday');
@endphp
@if ($time >= $dripDays)
  <article
        {{ $attributes->merge(['class' => '']) }}>
        <ul class="py-2 px-5 flex flex-col">
            <li><a href="#">{{ $lesson->title }}</a></li>
        </ul>
    </article>
@else
     <article
        {{ $attributes->merge(['class' => 'text-gray-400 ']) }}>
        <ul class="py-2 px-5 flex flex-col">
            <li>{{ $lesson->title }} <span class="text-xs"><br>Not Available until {{ $dripDays->format('m/d/y') }}</span></li>
        </ul>
    </article>
@endif
