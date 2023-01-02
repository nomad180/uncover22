<x-layout>
    <x-app-layout>
        <div class="py-4 px-4 md:px-8 lg:px-16 xl:px-32">
            <x-slot name="header">
                <img src="/images/aaaaa.jpg" alt="Banner with two bowls of oatmeal on the outsides and the text Blog in the middle" width="100%">
                <!--<h2 class="font-semibold text-xl text-gray-800 leading-tight">
                    {{ __('Uncover Your Fit') }}
                </h2>-->
            </x-slot>
            <div class="mx-auto sm:px-6 lg:px-8 bg-white border border-secondary/30 shadow-lg shadow-secondary/50 sm:rounded-lg pb-8 mb-10">
                <div class="flex pt-4">
                    <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                    <div class="w-1/3 text-secondary text-center">
                        <h1>Program Content</h1>
                    </div>
                    <div class="border-b-2 border-primary w-1/3 mb-6"></div>
                </div>
                <div class="flex flex-row">
                    <div class="flex flex-col pt-4 ml-4 mb-6 w-1/6">
                       @if ($lessons->count())
                       <x-lesson-grid :lessons="$lessons"/>
                       @else
                            <p class="text-center mt-6 w-full">No lessons yet. Please check back later.</p>
                        @endif
                    </div>
                    <div class="w-5/6 pt-6">
                        <iframe src="https://player.vimeo.com/video/346005621?h=5fe5b97180" width="100%" height="564" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
                    </div>
                </div>
                 <div class="w-full mt-6">{{ $lessons->links('pagination::tailwind') }}</div>
            </div>
        </div>
    </x-app-layout>
</x-layout>
