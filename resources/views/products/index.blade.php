@extends('layouts.app', ['pageTitle' => 'Products'])

@section('actions')
    @if(user())
        <a href="{{ route('products.create') }}"
            class="relative ml-auto inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-primary-500 hover:bg-primary-400 focus:outline-none focus:shadow-outline-indigo focus:border-primary-600 active:bg-primary-600 transition duration-150 ease-in-out">
            <svg class="-ml-1 mr-2 h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                <path fill-rule="evenodd"
                    d="M10 3a1 1 0 011 1v5h5a1 1 0 110 2h-5v5a1 1 0 11-2 0v-5H4a1 1 0 110-2h5V4a1 1 0 011-1z"
                    clip-rule="evenodd"></path>
            </svg>
            <span>New Product</span>
        </a>
    @endif
@endsection

@section('content')
<div class="flex flex-col">
    <div class="align-middle inline-block min-w-full shadow overflow-x-auto sm:rounded-lg border-b border-gray-200">
        <table class="min-w-full">
            <thead>
                <tr>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Product Name
                    </th>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Price
                    </th>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Address
                    </th>
                    <th
                        class="px-6 py-3 border-b border-gray-200 bg-gray-50 text-left text-xs leading-4 font-medium text-gray-500 uppercase tracking-wider">
                        Country
                    </th>
                    <th class="px-6 py-3 border-b border-gray-200 bg-gray-50"></th>
                </tr>
            </thead>
            <tbody class="bg-white">
                @foreach ($products as $product)
                <tr>
                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10">
                                <img class="h-10 w-10 object-cover rounded-lg" src="{{ $product->photo_url }}" alt="" />
                            </div>
                            <div class="ml-4">
                                <a href="{{ route('products.show', $product) }}"
                                    class="text-sm leading-5 font-medium text-primary-500 hover:text-primary-400 hover:underline">{{ $product->name }}</a>
                                <div class="text-sm leading-5 text-gray-500 truncate max-w-xs">
                                    {{ $product->description }}</div>
                            </div>
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200">
                        <div class="text-lg leading-5 text-gray-500">{{ money($product->price / 100) }}</div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-900">
                        <div>
                            {{ $product->address }}
                        </div>
                        <div class="text-gray-500">
                            {{ $product->city }},
                            {{ $product->state }}
                        </div>
                    </td>

                    <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-200 text-sm leading-5 text-gray-500">
                        {{ $product->country }}
                    </td>

                    <td
                        class="px-6 py-4 whitespace-no-wrap text-right border-b border-gray-200 text-sm leading-5 font-medium">
                        <a href="{{ route('products.edit', $product) }}" class="text-indigo-600 hover:text-indigo-900">Edit</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="mt-6">
        {{ $products->links() }}
    </div>
</div>
@endsection
