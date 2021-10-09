<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User profile
        </h2>
    </x-slot>

    <div class="pt-8 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded overflow-hidden relative flex">
                <div class="w-1/3 bg-white p-4 flex rounded">
                    <div class="relative bg-gray-200 rounded-full max-w-min">
                        <i class="fa fa-user-alt p-8 fa-lg"></i>
                        <span class="rounded-full absolute bottom-0 p-1 bg-green-300"></span>
                    </div>
                    <div class="ml-6">
                        <div class="font-bold text-xl text-gray-700">
                            {{$user->first_name}} {{$user->last_name}}
                        </div>
                        @if(\Illuminate\Support\Facades\Auth::user()->id === $user->id)
                            <div class="vue-app">
                                Needs to be a description of the auth user here.
                            </div>
                        @else
                            <div class="text-gray-700 text-sm mt-2">
                                Needs to be a description of the non auth user
                            </div>
                        @endif
                    </div>
                </div>
                <div class="w-2/3 bg-white p-4 ml-4 rounded">

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
