@props(['paging', 'uri'])

<div class="flex justify-between">
    <div>
        <a href="/{{$uri}}?{{$paging->getPreviousPageURI()}}">Previous</a>
        <a href="/{{$uri}}?{{$paging->getNextPageURI()}}">Next</a>
    </div>
    <div>
        Page {{$paging->getPage()}} of {{$paging->getPages()}}
    </div>
    <div>
        Total {{$paging->getTotal()}}
    </div>
</div>

