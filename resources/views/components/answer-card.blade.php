@props(['answer'])

<div class="p-6 border border-gray-200 rounded last mb-4 flex items-center">
    <div class="vue-app pr-4">
        <answer-ticks answer-id="{{$answer->id}}"></answer-ticks>
    </div>
    <div>
        <div class="text-sm">
            {!! $answer->answer !!}
        </div>
        <div class="text-xs text-gray-400 pt-4">
            Answered by: {{ $answer->answerer->first_name }} {{ $answer->answerer->last_name }}
            on {{ $answer->created_at->format('j F, Y H:i:s') }}
        </div>
    </div>
</div>
