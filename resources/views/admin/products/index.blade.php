@extends('app')

@section('content')

    <div class="container">
        <h3>Produtos</h3>

        <a href="{{ route('admin.products.create') }}" class="btn btn-default">Novo Produto</a>
        <br />
        <br />
        <table class="table table-bordered">
            <thead>
            <th>ID</th>
            <th>Produto</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Acao</th>
            </thead>
            <tbody>
            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->category->name }}</td>
                    <td>{{ $product->price }}</td>
                    <td>
                        <a href="{{route('admin.products.edit', ['id' => $product->id])}}" class="btn btn-default btn-sm" title="Editar Produto">
                            <span class="glyphicon glyphicon-edit"></span>
                        </a>
                        <a href="{{route('admin.products.destroy', ['id' => $product->id])}}" class="btn btn-danger btn-sm" title="Editar Produto">
                            <span class="glyphicon glyphicon-trash"></span>
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $products->render() !!}

    </div>

@endsection