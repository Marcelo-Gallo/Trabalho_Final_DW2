@extends('layouts.main')

@section('title', 'HDC Events')

@section('content')

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

@endsection