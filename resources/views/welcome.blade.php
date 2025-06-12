@extends('layouts.main')

@section('title', 'Loja Online')

@section('content')

<div class="container py-4">
    <div class="row mb-4 align-items-center">
        <div class="col-md-8">
            <h1 class="fw-bold mb-0">Produtos em destaque EDITADO!</h1>
            @if ($search ?? false)
                <h5 class="text-muted mt-2">Buscando por: <span class="fw-semibold">{{ $search }}</span></h5>
            @endif
            <form action="/" method="GET" class="d-inline">
                @if($search)
                    <input type="hidden" name="search" value="{{ $search }}">
                @endif
                <label for="category" class="me-2 fw-semibold text-primary">
                    <i class="bi bi-filter"></i> Filtrar por categoria:
                </label>
                <select name="category" id="category" class="form-select d-inline w-auto" style="display:inline-block;max-width:220px;" onchange="this.form.submit()">
                    <option value="">Todas</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{ (isset($selectedCategory) && $selectedCategory && $selectedCategory->id == $category->id) ? 'selected' : '' }}>
                            {{ $category->nome }}
                        </option>
                    @endforeach
                </select>
            </form>
        </div>
        <div class="col-md-4">
            <form action="/" method="GET" class="d-flex">
                <input type="text" id="search" name="search" class="form-control me-2" placeholder="Procurar produto..." value="{{ $search ?? '' }}">
                @if(isset($selectedCategory) && $selectedCategory)
                    <input type="hidden" name="category" value="{{ $selectedCategory->id }}">
                @endif
                <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i></button>
            </form>
        </div>
    </div>

    <div class="row g-4">
        @forelse ($products as $product)
            <div class="col-12 col-sm-6 col-md-4 col-lg-3 d-flex">
                <div class="card shadow-sm flex-fill h-100">
                    @if($product->imagem)
                        <img src="/img/products/{{ $product->imagem }}" alt="{{ $product->nome }}" class="card-img-top" style="object-fit:cover; height:180px;">
                    @else
                        <div class="bg-light d-flex align-items-center justify-content-center" style="height:180px;">
                            <i class="bi bi-image" style="font-size: 3rem; color: #ccc;"></i>
                        </div>
                    @endif
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title fw-semibold mb-1">{{ $product->nome }}</h5>
                        <p class="card-category text-muted mb-1" style="font-size: 0.95rem;">
                            <i class="bi bi-tag"></i>
                            {{ $product->categoria ? $product->categoria->nome : '-' }}
                        </p>
                        <p class="card-price fw-bold text-success mb-2" style="font-size: 1.2rem;">
                            R$ {{ number_format($product->preco, 2, ',', '.') }}
                        </p>
                        <div class="mt-auto">
                            <a href="/products/{{ $product->id }}" class="btn btn-outline-primary w-100 mb-2">
                                <i class="bi bi-eye"></i> Ver detalhes
                            </a>
                            @auth
                                @if(!auth()->user()->is_admin)
                                    <form action="/cart/add" method="POST" class="d-grid">
                                        @csrf
                                        <input type="hidden" name="produto_id" value="{{ $product->id }}">
                                        <input type="hidden" name="quantidade" value="1">
                                        <button type="submit" class="btn btn-success w-100">
                                            <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                                        </button>
                                    </form>
                                @else
                                    <button class="btn btn-success w-100" disabled>
                                        <i class="bi bi-cart-plus"></i> Adicionar ao Carrinho
                                    </button>
                                @endif
                            @endauth
                            @guest
                                <a href="/login" class="btn btn-success w-100">Entrar para comprar</a>
                            @endguest
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                @if ($search ?? false)
                    <p class="alert alert-warning mt-4">Não foi possível encontrar nenhum produto com <strong>"{{ $search }}"</strong>! <a href="/">Ver todos!</a></p>
                @else
                    <p class="alert alert-info mt-4">Não há produtos disponíveis.</p>
                @endif
            </div>
        @endforelse
    </div>
</div>
@endsection