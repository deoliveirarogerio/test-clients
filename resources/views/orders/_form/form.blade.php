@csrf
    <label for="client_id" class=" col-form-label">Cliente</label>
    <div class="col-sm-10">
        <select class="form-select" name="client_id" aria-label="Default select example">
            <option selected disabled hidden>Selecione</option>
            @foreach($clients as $client)
                <option value="{{ $client->id }}" {{ !empty($order) && $order->client_id ==  $client->id ? 'selected' : (old('client_id') ? 'selected' : '' ) }}>
                    {{ $client->name}}
                </option>
            @endforeach
        </select>
    </div>

    <label for="product_id" class=" col-form-label">Produtos</label>
    <div class="col-sm-10">
        <select class="form-select" name="product_id" aria-label="Default select example">
            <option selected disabled hidden>Selecione</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ !empty($order) && $order->product_id ==  $product->id ? 'selected' : (old('product_id') ? 'selected' : '' ) }}>
                    {{ $product->description }}
                </option>
            @endforeach
        </select>
    </div>

    <div class="row mb-3">
        <label for="order_number" class=" col-form-label">Número do Pedido</label>
        <div class="col-sm-10">
            <input type="number" name="order_number" class="form-control" id="order_number" value="{{ $order->order_number ?? old('order_number') }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="purchase_date" class=" col-form-label">Data do Pedido</label>
        <div class="col-sm-10">
            <input type="date" name="purchase_date" class="form-control" id="purchase_date" value="{{ $order->purchase_date ?? old('purchase_date') }}">
        </div>
    </div>

    <div class="row mb-3">
        <label for="amount" class=" col-form-label">Quantidade de Itens</label>
        <div class="col-sm-10">
            <input type="number" name="amount" class="form-control" id="amount" value="{{ $order->amount ??old('amount') }}">
        </div>
    </div>

<label for="status" class=" col-form-label">Status do Pedido</label>
<div class="col-sm-10">
    <select class="form-select" name="status" aria-label="Default select example">
        <option selected disabled hidden>Selecione</option>
            <option value="aberto" selected>Aberto</option>
            <option value="pago">Pago</option>
            <option value="cancelado">Cancelado</option>
    </select>
</div>

<button type="submit" class="btn btn-primary mt-4">Salvar</button>
