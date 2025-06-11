@extends('layouts.main')

@section('title', 'Equipe no GitHub')

@section('content')
<div class="container py-5">
    <h1 class="fw-bold mb-4 text-center">Nossa Equipe no GitHub</h1>
    <div class="row justify-content-center g-4">
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <img src="https://github.com/seu-usuario.png" alt="Seu Nome" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit:cover;">
                    <h5 class="card-title fw-semibold">Seu Nome</h5>
                    <p class="card-text text-muted mb-2">@seu-usuario</p>
                    <a href="https://github.com/seu-usuario" target="_blank" class="btn btn-dark w-100 mb-2">
                        <i class="bi bi-github me-1"></i> Ver GitHub
                    </a>
                    <p class="text-secondary small">Desenvolvedor Full Stack</p>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-6 col-lg-4">
            <div class="card shadow-sm h-100 text-center">
                <div class="card-body d-flex flex-column align-items-center">
                    <img src="https://github.com/parceiro-usuario.png" alt="Nome do Parceiro" class="rounded-circle mb-3" style="width: 100px; height: 100px; object-fit:cover;">
                    <h5 class="card-title fw-semibold">Nome do Parceiro</h5>
                    <p class="card-text text-muted mb-2">@parceiro-usuario</p>
                    <a href="https://github.com/parceiro-usuario" target="_blank" class="btn btn-dark w-100 mb-2">
                        <i class="bi bi-github me-1"></i> Ver GitHub
                    </a>
                    <p class="text-secondary small">Desenvolvedor Full Stack</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection