@extends('_theme')

@section('content')
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-yellow-700 bg-yellow-100 border border-yellow-300">{{ $error }}</li>
            @endforeach
        </ul>
    @endif
    <div class="col-lg-6">
        <form action="{{ route('clients.update', $client->id) }}" method="post">
            @csrf
            @method('put')
            <div class="row mb-3">
                <label for="name" class=" col-form-label">Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name" value="{{ $client->name }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="cpf" class="col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf" class="form-control" id="cpf" value="{{ $client->cpf }}">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="ccol-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Atualizar</button>
        </form>
    </div>

@endsection
