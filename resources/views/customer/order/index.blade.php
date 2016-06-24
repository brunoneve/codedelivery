@extends('app')

@section('content')

    <div class="container">
        <h3>Meus Pedidos</h3>

        <a href="{{ route('customer.order.create') }}" class="btn btn-default">Novo Pedido</a>
        <br /><br />

        <table class="table table-bordered">
            <thead>
                <tr>ID</tr>
                <tr>Total</tr>
                <tr>Status</tr>
            </thead>

            <tbody>
            @foreach($orders as $order)
            <tr>
                <td>{{ $order->id }}</td>
                <td>{{ $order->total }}</td>
                <td>{{ $order->status }}</td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>

@endsection