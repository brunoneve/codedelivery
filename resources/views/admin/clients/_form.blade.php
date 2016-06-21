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
    {!! Form::email('city', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('estado','Estado:') !!}
    {!! Form::email('state', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::label('cep','CEP:') !!}
    {!! Form::email('zipcode', null, ['class'=>'form-control']) !!}
</div>

<div class="form-group">
    {!! Form::submit('Criar Cliente',['class' => 'btn btn-primary']) !!}
</div>