@extends('layouts.main')

@section('title', 'Editar Produto')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Editando: {{ $product->nome }}</h1>
    <form action="/products/{{ $product->id }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $product->nome }}" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao">{{ $product->descricao }}</textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" value="{{ $product->preco }}" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" class="form-control" id="estoque" name="estoque" value="{{ $product->estoque }}" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select class="form-control" id="categoria_id" name="categoria_id">
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ $product->categoria_id == $category->id ? 'selected' : '' }}>{{ $category->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
            @if($product->imagem)
                <img src="/img/products/{{ $product->imagem }}" alt="{{ $product->nome }}" class="img-preview mt-2" style="max-width: 200px;">
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Atualizar</button>
    </form>
</div>
@endsection