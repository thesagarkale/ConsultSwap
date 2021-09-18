<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Messages') }}
        </h2>
    </x-slot>
    <div class="pt-8 pb-4 vue-app">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <messages-box :user="{{ \Illuminate\Support\Facades\Auth::user()->id }}"></messages-box>
        </div>
    </div>
</x-app-layout>