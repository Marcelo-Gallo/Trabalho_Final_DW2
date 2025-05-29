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

{{-- yield serve para carregar dinamicamente um conteudo --}}
@yield('content')

<footer>
    <p>HDC Events &copy; 2025</p>
</footer>
</body>

</html>