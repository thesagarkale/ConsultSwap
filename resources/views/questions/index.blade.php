<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between items-center" style="width: 100%">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ __('Questions') }}
            </h2>
            <div class="flex content-center">
                <a href="/questions/create"
                   class="bg-transparent text-red-400 font-semibold border-theme-salmon
                    py-1 px-2 rounded transition duration-150 ease-in text-sm hover:text-white hover:bg-theme-salmon">
                    <i class="fas fa-plus-square mr-1"></i>
                    Create
                </a>
                <div class="hidden sm:flex sm:items-center sm:ml-4">
                    <x-dropdown align="right" width="96">
                        <x-slot name="trigger">
                            <a href="#" class="text-sm bg-transparent font-semibold py-1 px-2 text-theme-dark
                            rounded transition duration-150 ease-in text-theme-blue hover:text-white hover:bg-theme-dark">
                                <i class="fas fa-filter"></i>
                                Filter
                            </a>
                        </x-slot>
                        <x-slot name="content">
                            <div class="p-4">
                                <form method="get" action="/questions">
                                    <div class="flex justify-between items-center text-sm pb-4">
                                        Categories
                                        <select class="text-sm rounded border border-gray-300 focus:border"
                                                name="category[]">
                                            <option value="">Please select</option>
                                            @foreach($categories as $category)
                                                <option class="capitalize" value="{{$category->id}}"
                                                        @if(in_array($category->id, $params['category'] ?? [])) selected @endif>
                                                    {{$category->label}}
                                                </option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="flex justify-end pt-4 text-sm border-t border-gray-200">
                                        <button type="submit" class="bg-theme-salmon text-white py-1 px-4 rounded">
                                            Apply
                                        </button>
                                        <a href="/questions"
                                           class="ml-2 border border-gray-300 py-1 px-4 rounded">Clear</a>
                                    </div>
                                </form>
                            </div>
                        </x-slot>
                    </x-dropdown>
                </div>
            </div>
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
