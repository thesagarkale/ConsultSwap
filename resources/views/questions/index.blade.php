<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" style="width: 100%">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Questions') }}
            </h2>
            <a href="/questions/create"
               class="bg-transparent hover:bg-red-400 text-red-400 font-semibold hover:text-white py-1 px-4 border
                        border-red-500 hover:border-transparent rounded">
                Create
            </a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-4">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($paging->getResults() as $question)
                        <div class="p-6 border border-gray-200 rounded last mb-4 flex justify-between">
                            <div>
                                <div class="font-weight-bold text-lg">
                                    {{ $question->title }}
                                </div>
                                <div class="text-sm pt-4">
                                    <pre>{{ $question->description }}<pre>
                                </div>
                                <x-tags :question_id="$question->id" :tags="$question->tags"/>
                                <div class="text-xs text-gray-400 pt-4">
                                    Asked by: {{ $question->creator->first_name }} {{ $question->creator->last_name }}
                                    on {{ $question->created_at->format('j F, Y H:i:s') }}
                                </div>
                            </div>
                            <div class="flex items-center">
                                <a href="/questions/{{$question->id}}"
                                   class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white
                                   py-2 px-4 border border-blue-500 hover:border-transparent rounded height">
                                    View
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
            <x-pagination-header :paging="$paging" uri="questions"></x-pagination-header>
        </div>
    </div>
</x-app-layout>
