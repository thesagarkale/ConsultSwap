<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Questions') }} #{{ $question->id }}
        </h2>
    </x-slot>

    <div class="pt-12 pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <a href="/questions" class="mb-4 bg-white hover:opacity-90 font-semibold
                                     py-2 px-4 border border-gray-300 rounded">
                < Back
            </a>
        </div>
    </div>

    <div class="pb-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="text-xl pb-4 capitalize">
                        {{ $question->title}}
                    </div>
                    <div class="text-sm capitalize">
                        <div>
                            {{ $question->description}}
                        </div>
                        <div class="pt-4">
                            <div class="flex pt-2">
                                <span class="font-bold text-gray-400 mr-4">Tags:</span>
                                @foreach($question->tags as $tag)
                                    <div class="bg-blue-400 mr-2 px-6 rounded flex items-center content-between">
                                        {{$tag->tag}}
                                        <form class="ml-4" action="/question/{{$question->id}}/tags/remove">
                                            <button type="submit" class="text-red-500 font-bold"> X </button>
                                        </form>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="text-xs text-gray-400 pt-4">
                            Asked by: <b>{{ $question->creator->first_name }} {{ $question->creator->last_name }}</b>
                            on {{ $question->created_at->format('j F, Y H:i:s') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-answers-list :answers="$answers"/>

    <x-create-answers :question_id="$question->id"/>
</x-app-layout>
<script>
    import Button from "../../../vendor/laravel/breeze/stubs/inertia/resources/js/Components/Button";
    export default {
        components: {Button}
    }
</script>
