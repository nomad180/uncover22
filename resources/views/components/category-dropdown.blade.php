<div class="text-secondary">Categories:</div>
    <!--<x-dropdown-item href="/?{{ http_build_query(request()->except('category' , 'page', 'author')) }}"
        :active="request()->routeIs('home')">All</x-dropdown-item>-->
    @foreach ($categories as $category)
    <x-dropdown-item
        href="/blog?category={{ $category->slug }}&{{ http_build_query(request()->except('category' , 'page', 'author')) }}"
        :active="isset($currentCategory) && $currentCategory->is($category)"
        >{{ ucwords($category->name) }}
    </x-dropdown-item>
    @endforeach

<!--{{ isset($currentCategory) ? ucwords($currentCategory->slug) : 'Uncover Your Fit' }}
'request()->is("categories/{$category->slug}")'
"isset($currentCategory) && $currentCategory->is($category)"
-->
