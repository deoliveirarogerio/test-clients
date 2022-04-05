@extends('_theme')

@section('content')
    @if ($errors->any())
        <div class="alert alert-warning">
            <ul>
                @foreach ($errors->all() as $error)
                    <li class="list-item">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="col-lg-6">
        <form action="{{ route('products.store') }}" method="post">
            @include('products/_form/form')
        </form>
    </div>

@endsection

