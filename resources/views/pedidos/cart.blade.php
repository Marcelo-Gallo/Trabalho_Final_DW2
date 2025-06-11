@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Seu Carrinho</h1>
    @if(count($products) > 0)
    <div class="table-responsive mb-3">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>Produto</th>
                    <th>Quantidade</th>
                    <th>Preço Unitário</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>
                        <div class="d-flex align-items-center">
                            @if($product->imagem)
                                <img src="/img/products/{{ $product->imagem }}" alt="{{ $product->nome }}" style="width: 50px; height: 50px; object-fit:cover;" class="rounded me-2">
                            @endif
                            <span>{{ $product->nome }}</span>
                        </div>
                    </td>
                    <td>{{ $cart[$product->id] ?? $product->pivot->quantidade }}</td>
                    <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                    <td>R$ {{ number_format(($cart[$product->id] ?? $product->pivot->quantidade) * $product->preco, 2, ',', '.') }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @auth
        @if(!auth()->user()->is_admin)
            <a href="/checkout" class="btn btn-success">Finalizar Pedido</a>
        @else
            <button class="btn btn-success" disabled>Finalizar Pedido</button>
        @endif
    @endauth
    @guest
        <a href="/login" class="btn btn-success">Entrar para comprar</a>
    @endguest
    @else
    <p class="alert alert-info">Seu carrinho está vazio.</p>
    @endif
</div>
@endsection