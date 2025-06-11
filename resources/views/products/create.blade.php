@extends('layouts.main')

@section('title', 'Novo Produto')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Novo Produto</h1>
    <form action="/products" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <div class="form-group">
            <label for="descricao">Descrição:</label>
            <textarea class="form-control" id="descricao" name="descricao"></textarea>
        </div>
        <div class="form-group">
            <label for="preco">Preço:</label>
            <input type="number" step="0.01" class="form-control" id="preco" name="preco" required>
        </div>
        <div class="form-group">
            <label for="estoque">Estoque:</label>
            <input type="number" class="form-control" id="estoque" name="estoque" required>
        </div>
        <div class="form-group">
            <label for="categoria_id">Categoria:</label>
            <select class="form-control" id="categoria_id" name="categoria_id">
                <option value="">Selecione</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->nome }}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="imagem">Imagem:</label>
            <input type="file" class="form-control-file" id="imagem" name="imagem">
        </div>
        <button type="submit" class="btn btn-primary">Salvar</button>
    </form>
</div>
@endsection