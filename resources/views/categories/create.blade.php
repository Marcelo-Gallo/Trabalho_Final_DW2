@extends('layouts.main')

@section('title', 'Nova Categoria')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Nova Categoria</h1>
    <form action="/categories" method="POST">
        @csrf
        <div class="form-group">
            <label for="nome">Nome:</label>
            <input type="text" class="form-control" id="nome" name="nome" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Salvar</button>
    </form>
</div>
@endsection