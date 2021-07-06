@props(['value', 'required'])

<label {{ $attributes->merge(['class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
    @if($required ?? false)
        <span class="text-theme-salmon ml-1">*</span>
    @endif
</label>
