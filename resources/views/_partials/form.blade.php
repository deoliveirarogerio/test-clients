
@csrf
<div class="row mb-3">
    <label for="description" class=" col-form-label">Cliente</label>
    <div class="col-sm-10">
        @if(!empty($clients))
            <select class="form-select" name="client_id" aria-label="Default select example">
                <option selected disabled>Escolha um cliente</option>
                @foreach($clients as $client)
                    <option value="{{ $client->id }}" {{ old('client_id') == $client->id ? 'selected' : null }}>{{ $client->name }}</option>
                @endforeach
            </select>
        @endif
    </div>
</div>

<div class="row mb-3">
    <label for="description" class=" col-form-label">Descrição do Produto</label>
    <div class="col-sm-10">
        <input type="text" name="description" class="form-control" id="description" value="{{ $product->description ?? old('description') }}">
    </div>
</div>

<div class="row mb-3">
    <label for="price" class="col-form-label">Preço</label>
    <div class="col-sm-10">
        <input type="text" name="price" class="form-control" id="price" value="{{ $product->price ?? old('price') }}">
    </div>
</div>
