@extends('app')

@section('content')

    <div class="container">
        <h3>Pedidos</h3>

        <table class="table table-bordered">
            <thead>
            <th>ID</th>
            <th>Acao</th>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <a href="" class="btn btn-default btn-sm" title="Excluir Categoria">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="" class="btn btn-danger btn-sm" title="Excluir Categoria">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $orders->render() !!}

    </div>

@endsection