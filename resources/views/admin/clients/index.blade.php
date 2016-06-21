@extends('app')

@section('content')

    <div class="container">
        <h3>Clientes</h3>

        <a href="{{ route('admin.clients.create') }}" class="btn btn-default">Novo Cliente</a>
        <br />
        <br />
        <table class="table table-bordered">
            <thead>
            <th>ID</th>
            <th>Nome</th>
            <th>E-mail</th>
            <th>Telefone</th>
            <th>Acao</th>
            </thead>
            <tbody>
            @foreach($clients as $client)
                <tr>
                    <td>{{ $client->id }}</td>
                    <td>{{ $client->user->name }}</td>
                    <td>{{ $client->user->email }}</td>
                    <td>{{ $client->phone }}</td>
                    <td>
                        <a href="{{route('admin.clients.edit', ['id' => $client->id])}}" class="btn btn-default btn-sm" title="Excluir Cliente">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="{{route('admin.clients.destroy', ['id' => $client->id])}}" class="btn btn-danger btn-sm" title="Excluir Cliente">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $clients->render() !!}

    </div>

@endsection