<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Question overview') }}
            </h2>
            <div>
                <a href="/dashboard" class="hover:bg-gray-200 rounded-full border-gray-200 border px-4 py-2 text-sm cursor-pointer">
                    Back to Dashboard
                </a>
            </div>
        </div>

    </x-slot>

    <div class="py-4 md:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap mx-1 overflow-hidden flex-col md:flex-row">
                <div class="my-1 px-1 md:w-3/4 overflow-hidden vue-app">
                    <question-overview :question="{{json_encode($question)}}"></question-overview>
                </div>

                <div class="my-1 px-1 md:w-1/4 overflow-hidden hidden md:block">
                    <div class="pb-4 border-b border-gray-200">
                        <div class="border-b-2 border-theme-salmon text-theme-salmon text-lg font-bold">
                            Discover
                        </div>
                        <div class="pt-4 flex flex-wrap">
                            <x-categories :categories="$categories"></x-categories>
                        </div>
                    </div>
                    <div class="py-4 border-b border-gray-200">
                        <div class="p-6 bg-white border-b border-gray-200 text-white font-bold relative"
                             style="background: url(https://picsum.photos/400?random=1&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0" style="background: rgba(0,0,0,0.3);"></div>
                        </div>
                        <div class="p-6 my-2 bg-white border-b border-gray-200 text-white font-bold relative"
                             style="background: url(https://picsum.photos/400?random=2&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0" style="background: rgba(0,0,0,0.3);"></div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200 text-white font-bold relative"
                             style="background: url(https://picsum.photos/400?random=3&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0" style="background: rgba(0,0,0,0.3);"></div>
                        </div>
                    </div>
                    <div class="pt-4">
                        <x-footer-links></x-footer-links>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
