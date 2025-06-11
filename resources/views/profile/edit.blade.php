@extends('layouts.main')

@section('title', 'Editar Perfil')

@section('content')
<div class="col-md-6 offset-md-3">
    <h1>Editar Perfil</h1>
    <form action="/profile" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="name">Nome:</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $user->name }}">
        </div>
        @if(!$user->is_admin)
        <div class="form-group">
            <label for="email">E-mail:</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $user->email }}">
        </div>
        @endif
        <input type="submit" class="btn btn-primary" value="Atualizar Dados">
    </form>
</div>
@endsection