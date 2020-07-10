@extends('layouts.app')

@section('content')
<div class="container">
    @if(Session::has('message'))
        <div class="alert alert-success">
            {{ Session::get('message') }}
        </div>
    @endif
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img class="img-fluid" src="{{$product->photo}}" alt="{{$product->name}}"/>
        </div>
        <div class="col-md-8">
            <h1>{{$product->name}}</h1>
            <p>{{$product->description}} </p>
            <p> {{$product->address}}, {{$product->state}}, {{$product->city}} {{$product->zip}} {{$product->country}}</p>
            <h2>{{$product->price}}</h2>

            @auth
                <a href="/products/{{$product->id}}/edit" class="btn btn-primary">Edit {{$product->name}}</a>
            @endauth

            @guest
                <p class="alert alert-danger">Please login to be able to edit {{$product->name}}
            @endguest
        </div>
    </div>
</div>
@endsection
