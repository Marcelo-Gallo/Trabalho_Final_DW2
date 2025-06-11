<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function edit()
    {
        $user = auth()->user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();

        // Se for admin, só pode alterar o nome
        if ($user->is_admin) {
            $request->validate([
                'name' => 'required|string|max:255',
            ]);
            $user->name = $request->name;
        } else {
            $request->validate([
                'name' => 'required|string|max:255',
                'email' => 'required|email|max:255|unique:users,email,'.$user->id,
            ]);
            $user->name = $request->name;
            $user->email = $request->email;
        }

        $user->save();

        return redirect('/profile')->with('msg', 'Dados atualizados com sucesso!');
    }
}