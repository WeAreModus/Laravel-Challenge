@props([
    'name',
    'placeholder' => null,
    'rows' => 3,
])

<div>
    <div class="mt-1 relative rounded-md shadow-sm">
        <textarea {{ $attributes }}
            name="{{ $name }}"
            placeholder="{{ $placeholder }}"
            class="form-textarea block w-full pr-10 sm:text-sm sm:leading-5
                @error($name)
                border-red-300 text-red-900 placeholder-red-300 focus:border-red-300 focus:shadow-outline-red
                @enderror
            "
        >{{ old($name) ?? $slot }}</textarea>

        @error($name)
            <div class="absolute inset-y-0 right-0 pr-1 flex items-start pt-1 pointer-events-none">
                <svg class="h-5 w-5 text-red-500" fill="currentColor" viewBox="0 0 20 20">
                    <path fill-rule="evenodd"
                        d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z"
                        clip-rule="evenodd" />
                </svg>
            </div>
        @enderror
    </div>

    @error($name)
        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
    @enderror
</div>
