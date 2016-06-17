@extends('app')

@section('content')
    <div class="container">
        <h3> Editar Produto: {{ $product->name }} </h3>

        @include('errors._check')

        {!! Form::model($product, ['route' => ['admin.products.update', $product->id]]) !!}

        @include('admin.products._form')

        {!! Form::close() !!}



    </div>

@endsection