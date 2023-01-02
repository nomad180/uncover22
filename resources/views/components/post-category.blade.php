 @props(['post'])
{{ $attributes->merge(['class' => 'transition-colors duration-300 hover:bg-gray-100 border border-black border-opacity-0 hover:border-opacity-5 rounded-xl']) }}>
<div class="space-x-2">
    <x-category-button :category="$post->category" />
</div>
