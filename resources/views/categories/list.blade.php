@extends('layouts.main')

@section('title', 'Categorias')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8 col-lg-5">
            <h1 class="fw-bold mb-4 text-center">Categorias</h1>
            <ul class="list-group list-group-flush shadow-sm">
                @foreach($categories as $category)
                    <li class="list-group-item d-flex justify-content-between align-items-center">
                        <a href="/?category={{ $category->id }}" class="text-decoration-none fw-semibold">
                            <i class="bi bi-tag me-1"></i>{{ $category->nome }}
                        </a>
                        <span class="badge bg-primary rounded-pill">
                            {{ $category->produtos()->count() }} produtos
                        </span>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
@endsection