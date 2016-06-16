@extends('app')

@section('content')
    <div class="container">
        <h3> Nova Categoria </h3>

        @if($errors->any())
            <ul cass="alert">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif

        {!! Form::open(['route' => 'admin.categories.store']) !!}

        <div class="form-group">
            {!! Form::label('name','Nome:') !!}
            {!! Form::text('name', null, ['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::submit('Criar Categoria',['class' => 'btn btn-primary']) !!}
        </div>

        {!! Form::close() !!}



    </div>

@endsection