@props(['questionId'])

<div>
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <form action="/questions/{{$questionId}}/answers" method="post">
                    @csrf

                    <div class="text-l pb-4">
                        Write an answer below
                    </div>
                    <x-auth-validation-errors class="mb-4" :errors="$errors"/>
                    <div class="text-sm">
                            <textarea id="answer" class="block rounded mt-1 border-gray-300 w-full h-40 resize-y"
                                      name="answer"
                                      :value="old('answer')" required></textarea>
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
