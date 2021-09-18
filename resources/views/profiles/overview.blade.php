<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{$user->first_name}} {{$user->last_name}}
        </h2>
    </x-slot>

    <div class="pt-12 pb-4">
        <div class="grid grid-rows-1 grid-cols-1 gap-4 max-w-7xl mx-auto sm:px-6 lg:px-8 md:grid-cols-3">
            <div class="row-span-1">
                <div class="p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="flex justify-center">
                        <x-profile-picture :user="$user"></x-profile-picture>
                    </div>
                    <div class="flex">
                        <a href="/messages?user={{$user->username}}" class="flex flex-col items-center mt-4 p-2 border border-theme-salmon rounded hover:text-white hover:bg-theme-salmon text-theme-salmon">
                            <i class="far fa-lg fa-comments"></i>
                            <span class="text-sm pt-2">Send message</span>
                        </a>
                    </div>
                <!--<table class="mt-8">
                    <tr>
                        <td class="font-bold" style="width: 33%;">Name</td>
                        <td class="font-light pl-2" style="width: 67%"> {{$user->first_name}} {{$user->last_name}}</td>
                    </tr>
                </table>-->
                </div>
                <div class="mt-4 p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="pb-4 font-bold">
                        Categories liked
                    </div>
                    <div class="flex break-words flex-wrap">
                        @foreach($user->categories as $category)
                            <a href="/questions?category[]={{$category->id}}" class="px-4 hover:text-white hover:bg-theme-salmon text-theme-salmon border border-theme-salmon rounded-full mr-1 mb-2">{{$category->label}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="row-span-1 col-span-2">
                <div class="p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-xl font-bold border-b border-theme-salmon pb-4">
                        Questions asked
                    </div>
                    <div class="py-4">
                        @foreach($user->questions as $question)
                            <div class="py-2 flex justify-between items-center">
                                <div>
                                    <p>
                                        {{$question->title}}
                                    </p>
                                    <div class="pt-2 text-sm">
                                        Interaction count: {{$question->answers->count()}}
                                    </div>
                                </div>
                                <div class="">
                                    <a href="/question/{{$question->id}}" class="px-2 py-1 text-sm text-theme-salmon border-theme-salmon
                                    border rounded hover:bg-theme-salmon hover:text-white">View</a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div
                    class="mt-4 p-6 bg-white border-b border-gray-200 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="text-xl pb-4 font-bold border-b border-gray-200">
                        Questions answered
                    </div>
                    <div class="py-4">
                        @foreach($user->answers as $answer)
                            <div>{{$answer->question->title}}</div>
                            <div class="flex">- {!! $answer->answer !!}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
