@extends('layouts.main')

@section('title', $product->nome)

@section('content')
<div class="col-md-10 offset-md-1">
    <div class="row">
        <div class="col-md-6">
            @if($product->imagem)
                <img src="/img/products/{{ $product->imagem }}" class="img-fluid" alt="{{ $product->nome }}">
            @endif
        </div>
        <div class="col-md-6">
            <h1>{{ $product->nome }}</h1>
            <p><strong>Categoria:</strong> {{ $product->categoria ? $product->categoria->nome : '-' }}</p>
            <p><strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}</p>
            <p><strong>Estoque:</strong> {{ $product->estoque }}</p>
            <p><strong>Descrição:</strong> {{ $product->descricao }}</p>
            <div class="d-flex gap-2 mt-3">
                @auth
                    @if(!auth()->user()->is_admin)
                        <form action="/cart/add" method="POST" class="d-inline">
                            @csrf
                            <input type="hidden" name="produto_id" value="{{ $product->id }}">
                            <label for="quantidade" class="form-label">Quantidade:</label>
                            <input type="number" name="quantidade" id="quantidade" value="1" min="1" max="{{ $product->estoque }}" class="form-control mb-2" style="width: 100px; display: inline-block;">
                            <button type="submit" class="btn btn-success">
                                <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                            </button>
                        </form>
                    @else
                        <a href="/products/{{ $product->id }}/edit" class="btn btn-info">
                            <i class="bi bi-pencil"></i> Editar Produto
                        </a>
                    @endif
                @endauth
                @guest
                    <a href="/login" class="btn btn-success">Entrar para comprar</a>
                @endguest
                <a href="/products" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection