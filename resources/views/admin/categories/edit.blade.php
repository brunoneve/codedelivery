@extends('app')

@section('content')
    <div class="container">
        <h3> Editar Categoria: {{ $category->name }} </h3>

        @include('errors._check')

        {!! Form::model($category, ['route' => ['admin.categories.update', $category->id]]) !!}

        @include('admin.categories._form')

        {!! Form::close() !!}



    </div>

@endsection