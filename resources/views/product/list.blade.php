@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <table class="table">
                <thead>
                    <tr>
                        <th>name</th>
                        <th>description</th>
                        <th>price</th>
                        <th>address</th>
                        <th>state</th>
                        <th>city</th>
                        <th>zip</th>
                        <th>country</th>
                        <th>photo</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td><a href="products/{{$product->id}}">{{$product->name}}</a></td>
                            <td> {{$product->description}}</td>
                            <td> {{$product->price}}</td>
                            <td> {{$product->address}}</td>
                            <td> {{$product->state}}</td>
                            <td> {{$product->city}}</td>
                            <td> {{$product->zip}}</td>
                            <td> {{$product->country}}</td>
                            <td> <img class="img-fluid" src="{{$product->photo}}" alt="{{$product->name}}"/> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
