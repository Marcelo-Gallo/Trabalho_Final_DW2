
@extends('layouts.main')

@section('title', 'Carrinho')

@section('content')
<div class="col-md-10 offset-md-1">
    <h1>Seu Carrinho</h1>
    @if(count($products) > 0)
    <table class="table">
        <thead>
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
                <td>{{ $product->nome }}</td>
                <td>{{ $cart[$product->id] }}</td>
                <td>R$ {{ number_format($product->preco, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($cart[$product->id] * $product->preco, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <a href="/checkout" class="btn btn-success">Finalizar Pedido</a>
    @else
    <p>Seu carrinho está vazio.</p>
    @endif
</div>
@endsection