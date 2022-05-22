<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Dashboard') }}
            </h2>
            <div class="vue-app">
                <create-question></create-question>
            </div>
        </div>
    </x-slot>

    <div class="p-2 md:py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="md:flex flex-wrap -mx-1 overflow-hidden">
                <div class="my-1 px-1 md:w-1/4 overflow-hidden md:block hidden">
                    <div class="pt-1 pr-1 pb-6">
                        <div class="border-b-2 border-theme-salmon text-theme-salmon text-lg font-bold">
                            Discover
                        </div>
                        <div class="flex flex-wrap">
                            @foreach($categories as $category)
                                <div class="capitalize mt-2 mr-2 text-sm
                                px-4 py-1 border rounded-full break-words border-theme-salmon text-theme-salmon
                                hover:text-white hover:bg-red-400 hover:border-red-400 cursor-pointer">
                                    {{ $category->label }}
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="my-1 md:px-1 md:w-2/4 overflow-hidden vue-app">
                    <questions-list :user-id="{{\Illuminate\Support\Facades\Auth::user()->id}}"></questions-list>
                </div>

                <div class="md:w-1/4 overflow-hidden p-2 md:pl-4 mt-1">
                    <div class="border-b border-gray-200 pb-4">
                        <div class="p-6 bg-white border-b border-gray-200 text-white font-bold relative z-50"
                             style="background: url(https://picsum.photos/400?random=1&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0 z-0" style="background: rgba(0,0,0,0.1);"></div>
                        </div>
                        <div class="p-6 my-2 bg-white border-b border-gray-200 text-white font-bold relative z-50"
                             style="background: url(https://picsum.photos/400?random=2&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0 z-0" style="background: rgba(0,0,0,0.1);"></div>
                        </div>
                        <div class="p-6 bg-white border-b border-gray-200 text-white font-bold relative z-50"
                             style="background: url(https://picsum.photos/400?random=3&&blur=1);">
                            Ads here
                            <div class="absolute top-0 right-0 bottom-0 left-0 z-0" style="background: rgba(0,0,0,0.1);"></div>
                        </div>
                    </div>

                    <div class="pt-4">
                        <x-footer-links></x-footer-links>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(!Auth::user()->inductionComplete())
        <induction user-id="{{Auth::user()->id}}"></induction>
    @endif
</x-app-layout>