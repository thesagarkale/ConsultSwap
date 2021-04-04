<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-transparent pb-4">
                <a href="/questions/create"
                   class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border
                        border-blue-500 hover:border-transparent rounded">
                    Create
                </a>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($questions as $question)
                        <div class="p-6 border border-gray-200 rounded last mb-4 flex justify-between">
                            <div>
                                <div class="font-weight-bold text-lg">
                                    {{ $question->title }}
                                </div>
                                <div class="text-sm">
                                    {{ $question->description }}
                                </div>
                            </div>
                            <div class="flex align-items-center">
                                <a href="/questions/{{$question->id}}"
                                   class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border
                        border-blue-500 hover:border-transparent rounded height">
                                    View
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
