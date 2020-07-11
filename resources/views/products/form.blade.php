@extends('layouts.app', ['pageTitle' => $product->name ?? 'New Product', 'backTo' => route('products.index')])

@section('content')
    <x-products.form :product="$product" multipart></x-products.form>
@endsection
