@props(['questionId', 'tags'])

<div class="pt-4">
    <div class="flex items-center pt-2 text-sm">
        <span class="font-bold text-gray-400 mr-4">Tags:</span>
        @foreach($tags as $tag)
            <div class="bg-blue-400 mr-2 px-6 rounded flex items-center content-between">
                {{$tag->tag}}
                <form class="ml-4" action="/question/{{$questionId}}/tags/remove">
                    <button type="submit" class="text-red-500 font-bold">X</button>
                </form>
            </div>
        @endforeach
        @if(!count($tags))
            <span class="italic text-gray-400">None assigned</span>
        @endif
    </div>
</div>
