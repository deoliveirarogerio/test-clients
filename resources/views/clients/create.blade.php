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
        <form action="{{ route('clients.store') }}" method="post">
            @include('clients/_form/form')
        </form>
    </div>

@endsection
