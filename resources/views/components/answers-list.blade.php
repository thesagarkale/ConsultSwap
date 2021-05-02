@props(['answers'])

<div class="pb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="text-xl pb-4">
                    Answers
                </div>
                <div>
                    @foreach($answers->getResults() as $answer)
                        <x-answer-card :answer="$answer"/>
                    @endforeach
                    @if(!count($answers->getResults()))
                        <div class="text-sm italic">
                            No answers yet!
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
