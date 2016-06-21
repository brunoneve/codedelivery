<div class="form-group">
    {!! Form::label('name','Nome:') !!}
    {!! Form::text('user[name]', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('email','Email:') !!}
    {!! Form::email('user[email]', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('telefone','Telefone:') !!}
    {!! Form::text('phone', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('endereco','Endereço:') !!}
    {!! Form::textarea('address', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cidade','Cidade:') !!}
    {!! Form::text('city', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('estado','Estado:') !!}
    {!! Form::text('state', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cep','CEP:') !!}
    {!! Form::text('zipcode', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Salvar',['class' => 'btn btn-primary']) !!}
</div>