
@extends('layouts.main')

@section('title', 'Loja Online')

@section('content')

<div id="search-container" class="col-md-12">
    <h1>Busque um produto</h1>
    <form action="/" method="GET">
        <input type="text" id="search" name="search" class="form-control" placeholder="Procurar">
    </form>
</div>

<div id="products-container" class="col-md-12">
    @if ($search ?? false)
        <h2>Buscando por: {{ $search }}</h2>
    @else
        <h2>Produtos em destaque</h2>
        <p class="subtitle">Veja os produtos disponíveis na loja</p>
    @endif
    <div id="cards-container" class="row">
        @foreach ($products as $product)
            <div class="card col-md-3">
                @if($product->imagem)
                    <img src="/img/products/{{ $product->imagem }}" alt="{{ $product->nome }}">
                @endif
                <div class="card-body">
                    <h5 class="card-title">{{ $product->nome }}</h5>
                    <p class="card-category">
                        <strong>Categoria:</strong> {{ $product->categoria ? $product->categoria->nome : '-' }}
                    </p>
                    <p class="card-price">
                        <strong>Preço:</strong> R$ {{ number_format($product->preco, 2, ',', '.') }}
                    </p>
                    <a href="/products/{{ $product->id }}" class="btn btn-primary">Ver detalhes</a>
                </div>
            </div>
        @endforeach

        @if (count($products) == 0 && ($search ?? false))
            <p>Não foi possível encontrar nenhum produto com "{{ $search }}"! <a href="/">Ver todos!</a></p>
        @elseif (count($products) == 0)
            <p>Não há produtos disponíveis</p>
        @endif
    </div>
</div>

@endsection