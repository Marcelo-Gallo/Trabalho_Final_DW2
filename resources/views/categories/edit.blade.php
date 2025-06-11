@extends('layouts.main')

@section('title', 'Editar Categoria')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Editando: {{ $category->nome }}</h1>
    <form action="/categories/{{ $category->id }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" value="{{ $category->nome }}" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Atualizar</button>
    </form>
</div>
@endsection