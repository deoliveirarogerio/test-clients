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
                            <td style="display: inline-flex;"><a href="{{ route('products.edit', $product->id) }}" class="btn btn-sm btn-info" title="Editar Cliente">Editar</a>
                                <form action="{{ route('products.destroy', $product->id) }}" method="post">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger" style="margin-left: 5px">Apagar</button>
                                </form>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            </div>
        </main>
    @endif
@endsection



