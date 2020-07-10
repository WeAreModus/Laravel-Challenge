@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-4">
            <img class="img-fluid" src="{{$product->photo}}" alt="{{$product->name}}"/>
        </div>
        <div class="col-md-8">

            <form method="POST">
                @csrf


            </form>

            {!!Form::model($product,['method'=>'POST'])!!}

            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {!!Form::label('name', 'Product Name')!!}
            {!!Form::text('name', $product->name, ['class'=>'form-control'])!!}

            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {!!Form::label('description', 'Product Description')!!}
            {!!Form::textarea('description', $product->description, ['class'=>'form-control'])!!}

            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            {!!Form::label('price', 'Product Price')!!}
            {!!Form::number('price', $product->price, ['class'=>'form-control'])!!}

            {!!Form::submit('Save changes', ['class'=>'btn btn-primary']);!!}

            {!!Form::close()!!}

        </div>
    </div>
</div>
@endsection
