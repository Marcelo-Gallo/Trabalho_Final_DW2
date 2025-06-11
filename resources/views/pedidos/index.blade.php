@extends('layouts.main')

@section('title', 'Pedidos')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Pedidos</h1>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($pedidos) > 0)
    <table class="table">
        <thead>
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
    @else
    <p>Você ainda não fez nenhum pedido.</p>
    @endif
</div>
@endsection