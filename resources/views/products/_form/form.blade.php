
@csrf
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

<button type="submit" class="btn btn-primary">Salvar</button>
