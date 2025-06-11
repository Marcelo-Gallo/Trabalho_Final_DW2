@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
<div class="container py-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold mb-0">Categorias</h1>
        <a href="/categories/create" class="btn btn-primary">
            <i class="bi bi-plus-circle me-1"></i> Nova Categoria
        </a>
    </div>
    <div class="card shadow-sm">
        <div class="card-body">
            @if(count($categories) > 0)
            <div class="table-responsive">
                <table class="table align-middle table-hover">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nome</th>
                            <th class="text-center">Qtd. Produtos</th>
                            <th class="text-center">Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $category)
                        <tr>
                            <th scope="row">{{ $loop->index + 1 }}</th>
                            <td>
                                <span class="fw-semibold">{{ $category->nome }}</span>
                            </td>
                            <td class="text-center">
                                <span class="badge bg-primary rounded-pill">
                                    {{ $category->produtos()->count() }}
                                </span>
                            </td>
                            <td class="text-center">
                                <a href="/categories/{{ $category->id }}/edit" class="btn btn-info btn-sm me-1">
                                    <i class="bi bi-pencil"></i> Editar
                                </a>
                                <form action="/categories/{{ $category->id }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Deletar
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            @else
            <p class="alert alert-info">Não há categorias cadastradas.</p>
            @endif
        </div>
    </div>
</div>
@endsection