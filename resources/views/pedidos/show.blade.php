
@extends('layouts.main')

@section('title', 'Pedido #' . $pedido->id)

@section('content')
<div class="col-md-10 offset-md-1">
    <h1>Pedido #{{ $pedido->id }}</h1>
    <p><strong>Data:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Status:</strong> {{ $pedido->status ?? 'Pendente' }}</p>
    <h3>Produtos</h3>
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
            @foreach ($pedido->produtos as $produto)
            <tr>
                <td>{{ $produto->nome }}</td>
                <td>{{ $produto->pivot->quantidade }}</td>
                <td>R$ {{ number_format($produto->pivot->preco_unitario, 2, ',', '.') }}</td>
                <td>R$ {{ number_format($produto->pivot->quantidade * $produto->pivot->preco_unitario, 2, ',', '.') }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <p><strong>Total:</strong> R$ {{ number_format($pedido->produtos->sum(function($produto) { return $produto->pivot->quantidade * $produto->pivot->preco_unitario; }), 2, ',', '.') }}</p>
    <a href="/pedidos" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection