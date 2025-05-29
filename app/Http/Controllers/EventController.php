<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    //|"index action" ou "a barra" |
    public function index() {
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
    }

    public function create() {
        return view('events.create');
    }
}
