<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $pedidos = Auth::user()->pedidos()->with('produtos')->get();
        return view('dashboard', ['pedidos' => $pedidos]);
    }
}