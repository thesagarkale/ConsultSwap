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

    <div class="py-8">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="flex flex-wrap -mx-1 overflow-hidden">
                <div class="my-1 px-1 w-1/4 overflow-hidden">
                    <div class="pt-1 pr-1 pb-6">
                        <div class="border-b-2 border-theme-salmon text-theme-salmon text-lg font-bold">
                            Discover
                        </div>
                    </div>
                </div>

                <div class="my-1 px-1 w-2/4 overflow-hidden">
                    <div class="vue-app">
                        <ask-a-question :user-id="{{\Illuminate\Support\Facades\Auth::user()->id}}"></ask-a-question>
                    </div>
                    <div class="mt-2 p-6 bg-white border-b border-gray-200">
                    </div>
                </div>

                <div class="my-1 px-1 w-1/4 overflow-hidden">
                    <div class="p-6 bg-white border-b border-gray-200">
                        Ads here
                    </div>
                    <div class="p-6 my-2 bg-white border-b border-gray-200">
                        Ads here
                    </div>
                    <div class="p-6 bg-white border-b border-gray-200">
                        Ads here
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>

<div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
    <div class="p-6 bg-white border-b border-gray-200 vue-app">
        @if(!Auth::user()->inductionComplete())
            <induction user-id="{{Auth::user()->id}}"></induction>
        @endif
    </div>
</div>