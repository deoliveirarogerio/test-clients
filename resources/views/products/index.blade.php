@extends('_theme')

@section('content')
    @if(!empty($products))
        <main class="content-clients">
            <h1>Listar Produtos</h1>
            <div class="table-responsive">
                <table class="table">
                    <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Descrição</th>
                        <th scope="col">Valor Unilário</th>
                        <th scope="col">Ações</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($products as $product)
                        <tr>
                            <th scope="row">{{ $product->id }}</th>
                            <td>{{ $product->description }}</td>
                            <td>{{ $product->price }}</td>
                            <td style="display: inline-flex;"><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info" title="Editar Produto">Editar</a>
                                <form onsubmit="return confirm('Tem certeza que deseja excluir?');" action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button style="margin-left: 5px" type="submit" class="btn btn-sm btn-danger">
                                        Apagar
                                    </button>
                                </form>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    @endif
@endsection



