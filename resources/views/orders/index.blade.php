@extends('_theme')

@section('content')
    @if(!empty($orders))
        <main class="content-clients">
            <h1>Listar Pedidos</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th>Cliente</th>
                        <th>Produto</th>
                        <th>Número do Pedido</th>
                        <th>Data do Pedido</th>
                        <th>Qt de Produtos</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orders as $order)
                        <tr>
                            <th scope="row">{{ $order->id }}</th>
                            <td>{{ $order->client()->name }}</td>
                            <td style="max-width: 200px">{{ $order->product()->description }}</td>
                            <td>{{ $order->order_number }}</td>
                            <td>{{ date_fmt($order->purchase_date, 'd/m/Y') }}</td>
                            <td>{{ $order->amount }}</td>
                            @if($order->status == 'aberto')
                                <td class="text-warning"><b>{{ $order->status }}</b></td>
                            @elseif($order->status == 'pago')
                                <td class="text-success"><b>{{ $order->status }}</b></td>
                            @elseif($order->status == 'cancelado')
                                <td class="text-danger"><b>{{ $order->status }}</b></td>
                            @endif
                            <td style="display: inline-flex;"><a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info" title="Editar Pedido">Editar</a>
                            <td style="display: inline-flex;"><a href="{{ route('orders.show', $order->id) }}" class="btn btn-sm btn-primary" title="Exibir Detalhes do Pedido">Detalhes</a>
                                <form onsubmit="return confirm('Tem certeza que deseja excluir?');" action="{{ route('orders.destroy', $order->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 5px" type="submit" class="btn btn-sm btn-danger">
                                        Apagar
                                    </button>
                                </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    @endif
    <script>

    </script>
@endsection
