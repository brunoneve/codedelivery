@extends('app')

@section('content')
    <div class="container">
        <h3> Nova Pedido </h3>

        @include('errors._check')


        <div class="container">
            {!! Form::open(['class' => 'form']) !!}

            <div class="form-group">
                <label>Total:</label>
                <p id="total"></p>
                <a href="#" id="newItem" class="btn btn-default">Novo Item</a>
                <br>
                <br>
                <table class="table table-bordered">
                    <thead>
                    <tr>
                        <th>Produto</th>
                        <th>Quantidade</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr>
                        <td>
                            <select class="form-control" name="items[0][product_id]">
                                @foreach($products as $p)
                                    <option value="{{ $p->id }}" data-price="{{ $p->price }}">{{ $p->name }} - R$ {{ $p->price }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                            {!! Form::text('items[0][qtd]', 1, ['class' => 'form-control']) !!}
                        </td>
                    </tr>
                    </tbody>

                </table>

            </div>

            {!! Form::submit('Criar Pedido', ['class' => 'btn btn-primary']) !!}

            {!! Form::close() !!}

        </div>


    </div>

@endsection

@section('post-script')
    <script>
        $('#newItem').click(function (){
            var row = $('table tbody > tr:last'),
                    newRow = row.clone(),
                    length = $("table tbody tr").length;

            newRow.find('td').each(function() {
                var td = $(this),
                        input = td.find('input,select'),
                        name = input.attr('name');

                input.attr('name', name.replace((length - 1) + "", length + ""));
            });

            newRow.find('input').val(1);
            newRow.insertAfter(row);
        });

        $(document.body).on('click', 'select', function (){
           calculateTotal();
        });

        $(document.body).on('blur', 'input', function(){
           calculateTotal();
        });

        function calculateTotal()
        {
            var total = 0,
                    trLen = $('table tbody tr').length,
                    tr = null, price, qtd;

            for(var i=0;i < trLen; i++)
            {
                tr = $('table tbody tr').eq(i);
                price = tr.find(':selected').data('price');
                qtd = tr.find('input').val();
                total += price * qtd;
            }
            $('#total').html(total);
        }
    </script>
@endsection