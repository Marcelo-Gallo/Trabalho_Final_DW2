
@extends('layouts.main')

@section('title', 'Checkout')

@section('content')
<div class="col-md-10 offset-md-1">
    <h1>Checkout</h1>
    <form action="/pedidos" method="POST">
        @csrf
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
        <button type="submit" class="btn btn-primary">Confirmar Pedido</button>
    </form>
</div>
@endsection