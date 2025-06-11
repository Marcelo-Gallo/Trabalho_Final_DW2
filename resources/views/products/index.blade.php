@extends('layouts.main')

@section('title', 'Produtos')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Todos os Produtos</h1>
        <a href="/products/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Novo Produto
        </a>
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
                            <a href="/products/{{ $product->id }}/edit" class="btn btn-info w-100 mb-2">Editar</a>
                            <form action="/products/{{ $product->id }}" method="POST" class="d-grid">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger w-100">Deletar</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12">
                <p class="alert alert-info mt-4">Não há produtos cadastrados.</p>
            </div>
        @endforelse
    </div>
</div>
@endsection