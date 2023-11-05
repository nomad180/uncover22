@props(['category'])
<a href="/blog?category={{ $category->slug }}&{{ http_build_query(request()->except('category' , 'page', 'author')) }}"
    class="px-3 py-1 border border-primary/50 rounded-full text-secondary text-xs uppercase font-semibold hover:bg-primary hover:text-white no-underline"
    style="font-size: 10px">
    {{ $category->name }}
</a>
