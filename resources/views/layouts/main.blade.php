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
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid">
                <a href="/" class="navbar-brand d-flex align-items-center">
                    <img src="/img/Gallo_Bertolli.png" alt="Gallo_Bertolli" style="height:50px;">
                    <span class="ms-2 fw-bold text-dark">G&B Supplies</span>
                </a>
                <!-- Botão toggler para mobile -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbar" aria-controls="navbar" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbar">
                    <ul class="navbar-nav ms-auto align-items-lg-center gap-2">
                        <!-- <li class="nav-item">
                            <a href="/products" class="nav-link">Produtos</a>
                        </li> -->
                        <!-- <li class="nav-item">
                            <a href="/categories" class="nav-link">Categorias</a>
                        </li> -->
                        @auth
                            @if(auth()->user()->is_admin)
                                <li class="nav-item">
                                    <a href="/products/create" class="nav-link text-warning fw-semibold">
                                        <i class="bi bi-plus-circle me-1"></i> Cadastrar Produto
                                    </a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <a href="/cart" class="nav-link position-relative">
                                    <ion-icon name="cart-outline" style="font-size: 1.5rem; vertical-align: middle;"></ion-icon>
                                    <span class="d-none d-lg-inline">Carrinho</span>
                                </a>
                            </li>
                            <!-- Dropdown Perfil -->
                            <li class="nav-item dropdown custom-profile-dropdown">
                                <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="profileDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                    <img src="{{ Auth::user()->profile_photo_url ?? '/img/default-user.png' }}" alt="Avatar" class="rounded-circle me-2 border" style="width:32px;height:32px;">
                                    <span class="fw-semibold">{{ Auth::user()->name }}</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="profileDropdown">
                                    <li>
                                        <a class="dropdown-item" href="/profile">
                                            <i class="bi bi-person-circle me-2"></i>Meu Perfil
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="/pedidos">
                                            <ion-icon name="list-outline" style="vertical-align: middle; margin-right: 8px;"></ion-icon>
                                            Meus Pedidos
                                        </a>
                                    </li>
                                    <li>
                                        <form action="/logout" method="POST" class="d-inline">
                                            @csrf
                                            <button type="submit" class="dropdown-item">
                                                <i class="bi bi-box-arrow-right me-2"></i>Sair
                                            </button>
                                        </form>
                                    </li>
                                </ul>
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

<footer class="bg-dark text-light py-4 mt-5">
    <div class="container d-flex flex-column flex-md-row justify-content-between align-items-center">
        <div class="mb-3 mb-md-0">
            <span class="fw-bold">G&B Supplies &copy; 2025</span>
        </div>
        <div>
            <a href="/contact" class="text-light text-decoration-none me-3" title="Fale conosco">
                <i class="bi bi-envelope me-1"></i>Contato
            </a>
            <a href="/github" class="text-light text-decoration-none me-3">
                <i class="bi bi-github"></i> GitHub
            </a>
        </div>
    </div>
</footer>
<!-- Ion Icons-->
<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<!-- Bootstrap Icons CDN -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.6/dist/js/bootstrap.bundle.min.js"></script>
<style>
    /* Customização do dropdown do perfil */
    .custom-profile-dropdown .dropdown-toggle {
        background: none !important;
        border: none !important;
        color: #212529 !important;
        font-weight: 500;
    }
    .custom-profile-dropdown .dropdown-menu {
        min-width: 180px;
    }
    .custom-profile-dropdown .dropdown-item i {
        color: #F2A340;
    }
    .navbar-nav .nav-link.active, .navbar-nav .nav-link:focus, .navbar-nav .nav-link:hover {
        color: #F2A340 !important;
    }
    .navbar-brand span {
        font-size: 1.2rem;
        letter-spacing: 1px;
    }
</style>
</body>

</html>