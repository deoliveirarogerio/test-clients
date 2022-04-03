@extends('_theme')

@section('content')
    @if (session('message'))
        <div class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-700 bg-green-100 border border-green-300 ">
            {{ session('message') }}
        </div>
    @endif
    <div class="col-lg-6">
        <form action="{{ route('products.store') }}" method="post">
            @include('_partials/form')
            <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>

@endsection

