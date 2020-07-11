@props([
    'for'
])

<label {{ $attributes }} for="{{ $for }}" class="block text-sm font-medium leading-5 text-gray-700">
    {{ $slot }}
</label>
