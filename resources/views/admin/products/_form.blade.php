<div class="form-group">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('name', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Categoria',['class' => 'btn btn-primary']) !!}
</div>