<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categoria;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = \App\Models\Categoria::orderBy('nome')->get();

        if (auth()->user() && auth()->user()->is_admin) {
            // Admin vê a tela de gerenciamento
            return view('categories.index', ['categories' => $categories]);
        } else {
            // Usuário comum vê a lista para filtrar produtos
            return view('categories.list', ['categories' => $categories]);
        }
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $category = new Categoria;
        $category->nome = $request->nome;
        $category->save();

        return redirect('/categories')->with('msg', 'Categoria criada com sucesso!');
    }

    public function edit($id)
    {
        $category = Categoria::findOrFail($id);
        return view('categories.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();
        Categoria::findOrFail($id)->update($data);

        return redirect('/categories')->with('msg', 'Categoria atualizada com sucesso!');
    }

    public function destroy($id)
    {
        Categoria::findOrFail($id)->delete();
        return redirect('/categories')->with('msg', 'Categoria removida com sucesso!');
    }
}