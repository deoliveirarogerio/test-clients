@extends('_theme')

@section('content')

    @if(!empty($clients))
    <main class="content-clients">
        <h1>Listar Clientes</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nome</th>
                        <th scope="col">CPF</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($clients as $client)
                    <tr>
                        <th scope="row">{{ $client->id }}</th>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->cpf }}</td>
                        <td>{{ $client->email }}</td>
                        <td style="display: inline-flex;"><a href="{{ route('clients.edit', $client->id) }}" class="btn btn-sm btn-info" title="Editar Cliente">Editar</a>
                            <form onsubmit="return confirm('Tem certeza que deseja excluir?');" action="{{ route('clients.destroy', $client->id) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button style="margin-left: 5px" type="submit" class="btn btn-sm btn-danger">
                                    Apagar
                                </button>
                            </form>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
    </main>
    @endif

@endsection

