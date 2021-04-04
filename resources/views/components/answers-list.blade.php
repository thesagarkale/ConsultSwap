@props(['answers'])

<div class="pb-4">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-200">
                <div class="text-xl pb-4">
                    Answers
                </div>
                <div>
                    @foreach($answers as $answer)
                        <div class="p-6 border border-gray-200 rounded last mb-4">
                            <div class="text-sm capitalize">
                                {{ $answer->answer }}
                            </div>
                            <div class="text-xs text-gray-400 pt-4">
                                Answered by: {{ $answer->answerer->first_name }} {{ $answer->answerer->last_name }}
                                on {{ $answer->created_at->format('j F, Y H:i:s') }}
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
