<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@yield('title')</title>

    <!-- Fonts do Google -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto" rel="stylesheet">

    <!-- CSS Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4Q6Gf2aSP4eDXB8Miphtr37CMZZQ5oXLH2yaXMJ2w8e2ZtHTl7GptT4jmndRuHDT" crossorigin="anonymous">
    
    <!-- CSS da Aplicação -->
    {{-- O diretório public é o "barra", sendo este a raiz do projeto --}}
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script> 

</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="collapse navbar-collapse" id="navbar">
                <a href="/" class="navbar-brand">
                    <img src="/img/hdcevents_logo.png" alt="HDC Events Logo">
                </a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="/products" class="nav-link">Produtos</a>
                    </li>
                    <li class="nav-item">
                        <a href="/categories" class="nav-link">Categorias</a>
                    </li>
                    @auth
    <li class="nav-item">
        <a href="/profile" class="nav-link">Meu Perfil</a>
    </li>
    @if(auth()->user()->is_admin)
        <li class="nav-item">
            <a href="/products/create" class="nav-link">Cadastrar Produto</a>
        </li>
    @endif
    <li class="nav-item">
        <a href="/pedidos" class="nav-link">Meus Pedidos</a>
    </li>
    <li class="nav-item">
        <a href="/cart" class="nav-link">Carrinho</a>
    </li>
    <li class="nav-item">
        <form action="/logout" method="POST">
            @csrf
            <a href="/logout" 
                class="nav-link"
                onclick="event.preventDefault();
                    this.closest('form').submit();">
                Sair
            </a>
        </form>
    </li>
@endauth
                    @guest
                    <li class="nav-item">
                        <a href="/login" class="nav-link">Entrar</a>
                    </li>
                    <li class="nav-item">
                        <a href="/register" class="nav-link">Cadastre-se</a>
                    </li>
                    @endguest
                </ul>
            </div>
        </nav>
    </header>

{{-- yield serve para carregar dinamicamente um conteudo --}}

<main>
    <div class="container-fluid">
        <div class="row">
            @if (session('msg'))
                <p class="msg">{{ session('msg') }}</p>
            @endif
            @yield('content')
        </div>
    </div>
</main>

<footer>
    <p>HDC Events &copy; 2025</p>
</footer>
<!-- Ion Icons-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>