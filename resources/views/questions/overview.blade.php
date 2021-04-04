<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }} #{{ $question->id }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl pb-4">
                        {{ $question->title}}
                    </div>
                    <div class="text-sm">
                        {{ $question->description}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl pb-4">
                        Answers
                    </div>
                    <div>
                        @foreach($answers as $answer)
                            <div class="p-6 border border-gray-200 rounded last mb-4 flex justify-between">
                                <div class="text-sm capitalize">
                                    {{ $answer->answer }}
                                </div>
                                <div class="text-sm">
                                    {{ $answer->answerer->first_name }} {{ $answer->answerer->last_name }}
                                </div>
                            </div>
                        @endforeach
                        @if(!count($answers))
                            <div class="text-sm italic">
                                No answers yet!
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="/questions/{{$question->id}}/answers" method="post">
                        @csrf

                        <div class="text-l pb-4">
                            Write an answer below
                        </div>
                        <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                        <div class="text-sm">
                            <textarea id="answer" class="block rounded mt-1 border-gray-300 w-full h-40 resize-y"
                                      name="answer"
                                      :value="old('answer')" required autofocus></textarea>
                        </div>
                        <div class="pt-4">
                            <button type="submit"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white
                                     py-2 px-4 border border-blue-500 hover:border-transparent rounded">
                                Submit
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
