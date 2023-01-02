@props(['success'])
@if (session()->has('success'))
    <div x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 6000)"
        x-show="show"
        class="fixed bg-secondary text-white p-4 rounded-xl bottom-3 right-3 text-sm"
    >
        <p>{{ session('success') }}</p>
@endif
