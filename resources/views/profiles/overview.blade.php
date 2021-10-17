<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            User profile
        </h2>
    </x-slot>

    <div class="pt-8 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="rounded overflow-hidden relative flex">
                <div class="w-1/3 p-4">
                    <div class="flex rounded">
                        <div class="relative bg-gray-200 max-w-min rounded-full" style="height: fit-content">
                            <i class="fa fa-user-alt p-8 fa-lg"></i>
                            <span class="rounded-full absolute bottom-0 p-1 bg-green-300"></span>
                        </div>
                        <div class="ml-6">
                            <div class="font-bold text-xl text-gray-700">
                                {{$user->first_name}} {{$user->last_name}}
                            </div>
                            @if(\Illuminate\Support\Facades\Auth::user()->id === $user->id)
                                <div class="vue-app">
                                    Needs to be a editable description of the auth user here.
                                </div>
                            @else
                                <div class="text-gray-700 text-sm mt-2">
                                    Needs to be a non editable description of the non auth user
                                </div>
                            @endif
                            <div class="mt-2 flex">
                                <div class="font-bold text-gray-700 mr-2">100 followers</div>
                                <div class="font-semibold text-gray-400 mr-2">.</div>
                                <div class="font-bold text-gray-700">100 following</div>
                            </div>
                        </div>
                    </div>
                    <div class="vue-app mt-8 flex flex-wrap items-center vue-app">
                        @if (\Illuminate\Support\Facades\Auth::user()->id !== $user->id)
                            <div class="rounded-full cursor-pointer border border-theme-salmon text-theme-salmon
                            hover:bg-theme-salmon px-4 py-1 hover:text-white text-sm mt-2">
                                <i class="fa fa-plus mr-2"></i>Follow
                            </div>
                            <user-profile-send-message :to-user="{{json_encode($user)}}"
                                                       :from-user="{{json_encode(\Illuminate\Support\Facades\Auth::user())}}">
                            </user-profile-send-message>
                            <div class="rounded-full cursor-pointer text-theme-salmon hover:bg-theme-salmon
                            hover:bg-theme-salmon px-4 py-1 hover:text-white text-sm ml-2 mt-2">
                                <i class="far fa-bell"></i>
                            </div>
                        @else
                            <div class="rounded-full cursor-pointer border border-theme-salmon text-theme-salmon
                            hover:bg-theme-salmon px-4 py-1 hover:text-white text-sm mt-2">
                                <i class="far fa-edit mr-2"></i>Edit
                            </div>
                        @endif
                        <div class="rounded-full cursor-pointer text-theme-salmon hover:bg-theme-salmon
                            hover:bg-theme-salmon px-4 py-1 hover:text-white text-sm mt-2">
                            <i class="fas fa-ellipsis-h"></i>
                        </div>
                    </div>
                    <div class="mt-8">
                        <div class="font-semibold border-b w-full pb-2 text-gray-800 flex justify-between">
                            Interested in
                            @if (\Illuminate\Support\Facades\Auth::user()->id === $user->id)
                                <i class="far fa-edit text-sm cursor-pointer"></i>
                            @endif
                        </div>
                        <div class="pt-2">
                            Categories go here
                        </div>
                    </div>
                    <div class="mt-8">
                        <div class="font-semibold border-b w-full pb-2 text-gray-800 flex justify-between">
                            Credentials
                        </div>
                        <div class="pt-2">
                            <ul>
                                <li>Creds go here</li>
                                <li>Work</li>
                                <li>Education</li>
                                <li>From </li>
                                <li>Joined</li>
                                <li>Languages</li>
                                <li>Links</li>
                            </ul>
                        </div>
                    </div>
                    <div class="mt-4">
                        <x-footer-links></x-footer-links>
                    </div>
                </div>
                <div class="vue-app w-2/3 p-4 ml-4 rounded">
                    <user-profile-tabs user-id="{{$user->id}}"></user-profile-tabs>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
