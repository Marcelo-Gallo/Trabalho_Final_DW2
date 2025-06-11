@extends('layouts.main')

@section('title', 'Contato')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h2 class="fw-bold mb-4">Contato</h2>
                    <form>
                        <div class="mb-3">
                            <label for="nome" class="form-label">Nome:</label>
                            <input type="text" class="form-control" id="nome" name="nome">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">E-mail:</label>
                            <input type="email" class="form-control" id="email" name="email">
                        </div>
                        <div class="mb-3">
                            <label for="mensagem" class="form-label">Mensagem:</label>
                            <textarea class="form-control" id="mensagem" name="mensagem"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary w-100">Enviar</button>
                    </form>
                    <a href="/" class="btn btn-link mt-3">Voltar para home</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection