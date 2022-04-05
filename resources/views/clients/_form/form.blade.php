@csrf
<div class="row mb-3">
    <label for="name" class=" col-form-label">Nome Completo</label>
    <div class="col-sm-10">
        <input type="text" name="name" class="form-control" id="name" value="{{ $client->name ?? old('name') }}">
    </div>
</div>

<div class="row mb-3">
    <label for="cpf" class="col-form-label">CPF</label>
    <div class="col-sm-10">
        <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $client->cpf ?? old('cpf') }}">
    </div>
</div>

<div class="row mb-3">
    <label for="email" class="ccol-form-label">E-mail</label>
    <div class="col-sm-10">
        <input type="email" name="email" class="form-control" id="email" value="{{ $client->email ?? old('email') }}">
    </div>
</div>

<button type="submit" class="btn btn-primary">Salvar</button>
