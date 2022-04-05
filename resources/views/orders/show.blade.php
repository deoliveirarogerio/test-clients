@extends('_theme')

@section('content')
    <h1>Exibindo dados do cliente </h1>
    @if(!empty($order))
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title">Cliente: </h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>{{ $order->client()->name }}</b></h6>
            <h5 class="card-title">Produto(s): </h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>{{ $order->product()->description }}</b></h6>
            <h5 class="card-title">Valor: </h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>{{ $order->product()->price }}</b></h6>
            <h5 class="card-title">Data do Pedido: </h5>
            <h6 class="card-subtitle mb-2 text-muted"><b>{{ date_fmt($order->purchase_date, 'd/m/Y') }}</b></h6>
            <a href="{{ route('orders.edit', $order->id) }}" class="btn btn-sm btn-info">Editar Dados da Compra</a>
            <a href="{{ route('orders.index') }}" class="btn btn-sm btn-dark mt-2">Voltar a Lista</a>
        </div>
    </div>
    @endif
@endsection
