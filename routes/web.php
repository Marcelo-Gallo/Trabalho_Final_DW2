<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {

    $nome = "Marcelo";
    $idade = 20;

    $array = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];

    $nomes = ["João", "Maria", "José", "Ana", "Pedro"];

    return view('welcome', [
        'nome' => $nome,
        'idade' => $idade,
        'profissao' => 'Pesquisador',
        'array' => $array,
        'nomes' => $nomes,
    ]);
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/produtos', function () {

    $busca = request('search');

    return view('products', ['busca' => $busca]);
});

Route::get('/produtos_teste/{id?}', function ($id = null) {
    return view('product', ['id' => $id]);
});
