<div class="rounded-xl border border-primary text-secondary px-3 pt-4 mt-4 mb-2">
    <form method="GET" action="/blog" class="border focus:border-primary ">
        @if (request('category'))
            <input type="hidden" name="category" value="{{ request('category') }}">
        @endif
        @if (request('author'))
            <input type="hidden" name="author" value="{{ request('author') }}">
        @endif
        <input type="text" name="search" placeholder="Search"
               class="font-semibold text-sm"
               value="{{ request('search') }}">
    </form>
</div>
