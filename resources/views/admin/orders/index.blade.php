@extends('app')

@section('content')

    <div class="container">
        <h3>Pedidos</h3>

        <table class="table table-bordered">
            <thead>
            <th>ID</th>
            <th>Total</th>
            <th>Data</th>
            <th>Itens</th>
            <th>Entregador</th>
            <th>Status</th>
            <th>Acao</th>
            </thead>
            <tbody>
            @foreach($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->created_at }}</td>
                    <td>
                        @foreach($order->items as $item)
                            <li>{{ $item->product->name }}</li>
                        @endforeach
                    </td>
                    <td>
                        @if( $order->deliveryman)
                            {{ $order->deliveryman->name }}
                        @else
                            --
                        @endif
                    </td>
                    <td>{{ $order->status }}</td>
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