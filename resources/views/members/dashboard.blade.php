<x-layout>
    <x-app-layout>
        <div class="py-4 px-4 md:px-8 lg:px-16 xl:px-32">
            <x-slot name="header">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight flex justify-center my-4">
                    {{ __('Dashboard') }}
                </h2>
            </x-slot>

            <div class="mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10 ">
                <div class="flex pt-4">
                    <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    <div class="w-1/3 text-secondary text-center">
                        <h1>Your Program</h1>
                    </div>
                    <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                </div>
                <div>
                    <a href="/uncoveryourfit">
                        <img src="/images/aaaaa2.jpg" alt="A female jogger bent down tying her shoe with the text Uncover Your Fit" width="100%">
                    </a>
                </div>
                <div class="mt-8">
                    <a href="/uncoveryourfit" class="inline-flex items-center py-2 px-8 bg-secondary border border-transparent rounded-full font-semibold text-xs text-white tracking-widest hover:bg-primary focus:bg-primary active:bg-primary focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150">Access Program</a>
                </div>
            </div>
            <div class="mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10 hidden">
                    <div class="flex pt-4">
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                        <div class="w-1/3 text-secondary text-center">
                            <h1>Resources</h1>
                        </div>
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap pt-4 ml-4 mb-6">
                       @if ($posts->count())
                       <x-post-grid-index :posts="$posts"/>
                       <div class="w-full mt-6">{{ $products->links('pagination::tailwind') }}</div>
                       @else
                            <p class="text-center mt-6 w-full">No posts yet. Please check back later.</p>
                        @endif
                    </div>
                </div>
                <div class="mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10 hidden">
                    <div class="flex pt-4">
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                        <div class="w-1/3 text-secondary text-center">
                            <h1>Other Products</h1>
                        </div>
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap pt-4 ml-4 mb-6">
                       @if ($products->count())
                       <x-product-grid-index :products="$products"/>
                       <div class="w-full mt-6">{{ $products->links('pagination::tailwind') }}</div>
                       @else
                            <p class="text-center mt-6 w-full">No products yet. Please check back later.</p>
                        @endif
                    </div>
                </div>
                <div class="mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-6">
                    <div class="flex pt-4">
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                        <div class="w-1/3 text-secondary text-center">
                            <h1>Latest Blog Posts</h1>
                        </div>
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap pt-4 ml-4 mb-6">
                       @if ($posts->count())
                       <x-post-grid-index :posts="$posts"/>
                       @else
                            <p class="text-center mt-6 w-full">No posts yet. Please check back later.</p>
                        @endif
                    </div>
                    <div id="button" class="flex justify-center w-full text-2xl">
                        <a href="blog" class="inline-flex items-center py-2 px-8 bg-secondary rounded-full text-white hover:bg-primary">See More Posts</a>
                    </div>
                </div>
                <div class="hidden mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-6">
                    <div class="flex pt-4">
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                        <div class="w-1/3 text-secondary text-center">
                            <h1>FAQs</h1>
                        </div>
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    </div>
                    <div class="flex flex-col md:flex-row flex-wrap pt-4 ml-4 mb-6">
                       Frequently asked questions
                    </div>
                </div>
                <div class="hidden mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-6">
                    <div class="flex pt-4">
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                        <div class="w-1/3 text-secondary text-center">
                            <h1>Contact Us</h1>
                        </div>
                        <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    </div>
                    <div>
                        <x-auth-card2><x-contact /></x-auth-card2>
                    </div>
                </div>
        </div>
    </x-app-layout>
</x-layout>
