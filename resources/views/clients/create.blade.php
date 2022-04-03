@extends('_theme')

@section('content')
    @if (session('message'))
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-lg-6">
        <form action="{{ route('clients.store') }}" method="post">
            @csrf
            <div class="row mb-3">
                <label for="name" class=" col-form-label">Nome Completo</label>
                <div class="col-sm-10">
                    <input type="text" name="name" class="form-control" id="name">
                </div>
            </div>

            <div class="row mb-3">
                <label for="cpf" class="col-form-label">CPF</label>
                <div class="col-sm-10">
                    <input type="text" name="cpf" class="form-control" id="cpf">
                </div>
            </div>

            <div class="row mb-3">
                <label for="email" class="ccol-form-label">E-mail</label>
                <div class="col-sm-10">
                    <input type="email" name="email" class="form-control" id="email">
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection
