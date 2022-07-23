@props(['categories'])

@foreach($categories as $category)
    <div class="capitalize mt-2 mr-2 text-sm
    px-4 py-1 border rounded-full break-words border-theme-salmon text-theme-salmon
    hover:text-white hover:bg-red-400 hover:border-red-400 cursor-pointer">
        {{ $category->label }}
    </div>
@endforeach
