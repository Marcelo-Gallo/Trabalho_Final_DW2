@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Categorias</h1>
    <a href="/categories/create" class="btn btn-primary mb-3">Nova Categoria</a>
</div>

<div class="col-md-10 offset-md-1 dashboard-events-container">
    @if(count($categories) > 0)
    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nome</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <th scope="row">{{ $loop->index + 1 }}</th>
                <td>{{ $category->nome }}</td>
                <td>
                    <a href="/categories/{{ $category->id }}/edit" class="btn btn-info btn-sm">Editar</a>
                    <form action="/categories/{{ $category->id }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Deletar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    @else
    <p>Não há categorias cadastradas.</p>
    @endif
</div>
@endsection