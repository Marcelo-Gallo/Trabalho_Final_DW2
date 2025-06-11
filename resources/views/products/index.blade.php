@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Produtos</h1>
    <a href="/products/create" class="btn btn-primary mb-3">Novo Produto</a>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($products) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Categoria</th>
                <th>Preço</th>
                <th>Estoque</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td><a href="/products/{{ $product->id }}">{{ $product->nome }}</a></td>
                <td>{{ $product->categoria ? $product->categoria->nome : '-' }}</td>
                <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                <td>{{ $product->estoque }}</td>
                <td>
                    <a href="/products/{{ $product->id }}/edit" class="btn btn-info btn-sm">Editar</a>
                    <form action="/products/{{ $product->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não há produtos cadastrados.</p>
    @endif
</div>
@endsection