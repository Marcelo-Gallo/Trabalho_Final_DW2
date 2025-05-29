<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    {{-- O diretório public é o "barra", sendo este a raiz do projeto --}}
    <link rel="stylesheet" href="/css/styles.css">
    <script src="/js/scripts.js"></script> 
</head>

<body>
    <h1>Algum titulo</h1>
    <img src="/img/Laravel.png" alt="Laravel Logo">
    @if(10 > 5)
        <p>A condição é true</p>
    @endif
    <p>{{ $nome }}</p>

    @if ($nome == 'Pedro')
        <p>O nome é João</p>
    @elseif ($nome == 'Marcelo')
        <p>O nome é {{ $nome }} e ele tem {{ $idade }} anos e trabalha como {{ $profissao }}</p>
    @else
        <p>O nome não é João</p>
    @endif

    @for ($i = 0; $i < count($array); $i++)
        <p>{{ $array[$i] }} - {{ $i }}</p>
        @if ($i == 2)
            <p>O índice é 2</p>
        @endif
    @endfor

    @foreach ($nomes as $nome)
        <p>{{ $loop->index }}</p>
        <p>{{ $nome }}</p>
    @endforeach

    @php
        $name = 'Gallo';
        echo "O nome é $name";
    @endphp
    <!-- Comentário do HTML -->
    {{-- Comentário do Blade --}}
</body>

</html>