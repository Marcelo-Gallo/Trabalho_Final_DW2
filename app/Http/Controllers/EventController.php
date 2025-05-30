<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Event;

class EventController extends Controller
{
    //|"index action" ou "a barra" |
    public function index() {

        //metodo ORM all() retorna todos os eventos do banco
        $events = Event::all();

        return view('welcome', ['events' => $events]);
    }

    public function create() {
        return view('events.create');
    }
}
