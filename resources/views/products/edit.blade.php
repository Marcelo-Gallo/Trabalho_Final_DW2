@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="fw-bold mb-4">Editando: {{ $product->nome }}</h2>
                    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" value="{{ $product->nome }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao">{{ $product->descricao }}</textarea>
                        </div>
                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço:</label>
                            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ $product->preco }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="estoque" class="form-label">Estoque:</label>
                            <input type="number" class="form-control" id="estoque" name="estoque" value="{{ $product->estoque }}" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoria:</label>
                            <select class="form-select" id="categoria_id" name="categoria_id" required>
                                <option value="">Selecione</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ $product->categoria_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->nome }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem:</label>
                            <input type="file" class="form-control" id="imagem" name="imagem">
                            @if($product->imagem)
                                <img src="/img/products/{{ $product->imagem }}" alt="{{ $product->nome }}" class="img-preview mt-2" style="max-width: 200px;">
                            @endif
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Atualizar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection