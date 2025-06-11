@extends('layouts.main')

@section('title', 'Pedido #' . $pedido->id)

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-3">Pedido #{{ $pedido->id }}</h1>
    <p><strong>Data:</strong> {{ $pedido->created_at->format('d/m/Y H:i') }}</p>
    <p><strong>Status:</strong> {{ $pedido->status ?? 'Pendente' }}</p>
    <h3 class="mt-4 mb-3">Produtos</h3>
    <div class="table-responsive">
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
    </div>
    <p class="fw-bold mt-3">Total: R$ {{ number_format($pedido->produtos->sum(function($produto) { return $produto->pivot->quantidade * $produto->pivot->preco_unitario; }), 2, ',', '.') }}</p>
    <a href="/pedidos" class="btn btn-secondary mt-3">Voltar</a>
</div>
@endsection