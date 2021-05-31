<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create Question') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />
                    <form method="POST" action="{{ route('question_store') }}">
                        @csrf
                        <div>
                            <x-label for="title" :value="__('Title')"/>

                            <x-input id="title" class="block mt-1 w-full" type="text" name="title"
                                     :value="old('title')" required/>
                        </div>
                        <div class="mt-4">
                            <x-label for="description" :value="__('Description')"/>

                            <textarea id="description" class="block rounded mt-1 border-gray-300 w-full h-40 resize-y"
                                      name="description"
                                      :value="old('description')" required></textarea>
                        </div>
                        <div class="mt-4">
                            <x-label for="tags" :value="__('Tags')"/>

                            <select class="block rounded mt-1 border-gray-300 w-full" name="tags[]" multiple>
                                @foreach($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <x-label for="tags" :value="__('Category')"/>

                            <select class="block rounded mt-1 border-gray-300 w-full" name="category">
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->label }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mt-4">
                            <button type="submit"
                                    class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border
                        border-blue-500 hover:border-transparent rounded">
                                Create
                            </button>
                            <a href="{{route('questions_index')}}" class="bg-transparent hover:opacity-50 py-2 px-4 border
                              rounded">
                                Back
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
