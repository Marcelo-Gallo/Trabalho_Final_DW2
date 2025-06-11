@extends('layouts.main')

@section('title', 'Pedidos')

@section('content')
<div class="container py-4">
    <h1 class="fw-bold mb-4">Meus Pedidos</h1>
    @if(count($pedidos) > 0)
    <div class="table-responsive">
        <table class="table align-middle">
            <thead class="table-light">
                <tr>
                    <th>#</th>
                    <th>Data</th>
                    <th>Status</th>
                    <th>Total</th>
                    <th>Ações</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $pedido)
                <tr>
                    <th scope="row">{{ $loop->index + 1 }}</th>
                    <td>{{ $pedido->created_at->format('d/m/Y H:i') }}</td>
                    <td>{{ $pedido->status ?? 'Pendente' }}</td>
                    <td>
                        R$ {{ number_format($pedido->produtos->sum(function($produto) { return $produto->pivot->quantidade * $produto->pivot->preco_unitario; }), 2, ',', '.') }}
                    </td>
                    <td>
                        <a href="/pedidos/{{ $pedido->id }}" class="btn btn-info btn-sm">Ver</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @else
    <p class="alert alert-info">Você ainda não fez nenhum pedido.</p>
    @endif
</div>
@endsection