<x-layout>
    @include ('posts.posts-header')
    <x-post-submit>
        <section class="px-6 py-8">
            <h1 class="font-semibold text-xl text-center text-primary pb-6">Publish New Post</h1>
            <form method="POST" action="/admin/posts" enctype="multipart/form-data">
                @csrf

                <!-- Title -->
                <div class="mb-6">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" type="text" name="title" :value="old('title')" required autofocus />
                    <x-input-error :messages="$errors->get('title')" class="mt-2" />
                </div>

                <!-- Slug -->
                <div class="mb-6">
                    <x-input-label for="slug" :value="__('Slug')" />
                    <x-text-input id="slug" class="block mt-1 w-full" type="text" name="slug" :value="old('slug')" required />
                    <x-input-error :messages="$errors->get('slug')" class="mt-2" />
                </div>

                <!-- Thumbnail -->
                <div class="mb-6">
                    <x-input-label for="thumbnail" :value="__('Thumbnail')" />
                    <x-text-input id="thumbnail" class="block mt-1 w-full" type="file" name="thumbnail" :value="old('thumbnail')" required />
                    <x-input-error :messages="$errors->get('thumbnail')" class="mt-2" />
                </div>

                <!-- Excerpt -->
                <div class="mb-6">
                    <x-input-label for="excerpt" :value="__('Excerpt')" />
                    <x-text-input id="excerpt" class="block mt-1 w-full" type="text" name="excerpt" :value="old('excerpt')" required />
                    <x-input-error :messages="$errors->get('excerpt')" class="mt-2" />
                </div>

                <!-- Body-->
                <div class="mb-6">
                    <x-input-label for="body" :value="__('Body')" />
                    <x-tinymce id="body" class="block mt-1 w-full" type="text" :value="old('body')" required />
                    <x-input-error :messages="$errors->get('body')" class="mt-2" />
                </div>
                <!-- Category-->
                <div class="mb-6">
                    <x-input-label for="category_id" :value="__('Category')" />
                    <select name="category_id" id="category_id">
                        @foreach (\App\Models\Category::all() as $category)
                        <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                        @endforeach
                    </select>
                   <!-- <x-text-input id="category" class="block mt-1 w-full" type="text" name="category" :value="old('category')" required />-->
                    <x-input-error :messages="$errors->get('category')" class="mt-2" />
                </div>
                <div class="flex items-center justify-center mt-4">
                <x-primary-button class="ml-4">
                    {{ __('Publish') }}
                </x-primary-button>
            </div>
            </form>
        </section>
</x-post-submit>
</x-layout>
