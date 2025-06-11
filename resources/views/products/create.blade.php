@extends('layouts.main')

@section('title', 'Novo Produto')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="fw-bold mb-4">Cadastrar Produto</h2>
                    <form action="/products" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome" required>
                        </div>
                        <div class="mb-3">
                            <label for="descricao" class="form-label">Descrição:</label>
                            <textarea class="form-control" id="descricao" name="descricao"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="preco" class="form-label">Preço:</label>
                            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
                        </div>
                        <div class="mb-3">
                            <label for="estoque" class="form-label">Estoque:</label>
                            <input type="number" class="form-control" id="estoque" name="estoque" required>
                        </div>
                        <div class="mb-3">
                            <label for="categoria_id" class="form-label">Categoria:</label>
                            <select class="form-select" id="categoria_id" name="categoria_id" required>
                                <option value="">Selecione</option>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->nome }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="imagem" class="form-label">Imagem:</label>
                            <input type="file" class="form-control" id="imagem" name="imagem">
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection