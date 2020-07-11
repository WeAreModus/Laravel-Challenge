@props(['product', 'multipart' => false])

@php
$action = $product->id
? route('products.update', $product)
: route('products.store');
$method = $product->id ? 'PUT' : 'POST';
@endphp

<form action="{{ $action }}" method="POST" @if($multipart) enctype="multipart/form-data" @endif>
    @csrf
    @method($method)

    <div class="bg-white p-6 rounded-lg shadow-lg">
        <div>
            <div class="grid grid-cols-1 row-gap-6 col-gap-6 sm:grid-cols-6">
                <div class="sm:col-span-1">
                    <div class="sm:col-span-6" x-data="{
                        preview: '',
                        updatePreview(event) {
                            var file = event.target.files[0];
                            if (!file) {
                                this.preview = '';
                                return;
                            };

                            var reader = new FileReader();
                            reader.onload = e => this.preview = e.target.result;
                            reader.readAsDataURL(file);
                        }
                    }">
                        <x-label for="photo">Photo</x-label>

                        <div class="mt-1 flex flex-col justify-between">
                            <span
                                class="w-full rounded-lg overflow-hidden bg-gray-100 flex items-center justify-center">
                                <img x-show="!preview" class="object-cover"
                                    src="{{ $product->photo_url ?? 'https://lunawood.com/wp-content/uploads/2018/02/placeholder-image.png' }}"
                                    alt="Product Photo">
                                <img x-show="preview" class="object-cover" :src="preview" alt="Product Preview">
                            </span>

                            <input type="file" accept="image/*" name="photo" x-ref="input" class="hidden"
                                @change="updatePreview">

                            <button type="button" @click="$refs.input.click()"
                                class="py-2 px-3 flex w-full justify-center border border-gray-300 mt-3 rounded-md shadow-sm text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                                Change
                            </button>
                        </div>

                        @error('photo')
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                <div class="sm:col-span-5">
                    <div>
                        <x-label for="name">Name</x-label>
                        <x-input id="name" name="name" value="{{ $product->name }}"></x-input>
                    </div>

                    <div class="mt-6">
                        <x-label for="description">Description</x-label>
                        <x-textarea id="description" rows="3" name="description">{{ $product->description }}
                        </x-textarea>
                        <p class="mt-2 text-sm text-gray-500">Write a description about the product.</p>
                    </div>
                </div>

                <div class="sm:col-span-4">
                    <x-label for="price">Price $ (in cents)</x-label>
                    <x-input id="price" type="number" name="price" step="1" min="0" value="{{ $product->price }}" />
                    <p class="mt-2 text-sm text-gray-500">Provide the price in cents.</p>
                </div>

                <div class="sm:col-span-4">
                    <x-label for="address">Street address</x-label>
                    <x-input id="address" name="address" :value="$product->address"></x-input>
                </div>

                <div class="sm:col-span-2">
                    <x-label for="country">Country / Region</x-label>
                    <x-select id="country" name="country" :options="countries()" :value="$product->country"
                        track-by="name" default-value="United States" />
                </div>

                <div class="sm:col-span-2">
                    <x-label for="city">City</x-label>
                    <x-input id="city" name="city" :value="$product->city"></x-input>
                </div>

                <div class="sm:col-span-2">
                    <x-label for="state">State / Province</x-label>
                    <x-input id="state" name="state" :value="$product->state"></x-input>
                </div>

                <div class="sm:col-span-2">
                    <x-label for="zip">ZIP / Postal</x-label>
                    <x-input id="zip" name="zip" :value="$product->zip"></x-input>
                </div>
            </div>
        </div>

        <div class="mt-8 border-t border-gray-200 pt-5">
            <div class="flex justify-end">
                <a href="{{ route('products.index') }}" type="button"
                    class="py-2 px-4 border border-gray-300 inline-flex rounded-md shadow-sm text-sm leading-5 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                    Cancel
                </a>

                <span class="">
                    <button type="submit"
                        class="ml-3 inline-flex rounded-md shadow-sm justify-center py-2 px-4 border border-transparent text-sm leading-5 font-medium text-white bg-primary-600 hover:bg-primary-500 focus:outline-none focus:border-primary-700 focus:shadow-outline-indigo active:bg-primary-700 transition duration-150 ease-in-out">
                        Save
                    </button>
                </span>
            </div>
        </div>
    </div>
</form>
