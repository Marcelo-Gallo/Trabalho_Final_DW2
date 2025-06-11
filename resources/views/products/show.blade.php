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
            <a href="/products" class="btn btn-secondary mt-3">Voltar</a>
        </div>
    </div>
</div>
@endsection