<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;
use App\Models\Categoria;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        $categoryId = $request->input('category');

        $query = \App\Models\Produto::query();

        if ($search) {
            $query->where('nome', 'like', '%' . $search . '%');
        }
        if ($categoryId) {
            $query->where('categoria_id', $categoryId);
            $selectedCategory = \App\Models\Categoria::find($categoryId);
        } else {
            $selectedCategory = null;
        }

        $products = $query->get();
        $categories = \App\Models\Categoria::orderBy('nome')->get();

        return view('welcome', [
            'products' => $products,
            'search' => $search,
            'selectedCategory' => $selectedCategory,
            'categories' => $categories
        ]);
    }

    public function create()
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403, 'Acesso não autorizado.');
        }
        $categories = Categoria::all();
        return view('products.create', ['categories' => $categories]);
    }

    public function store(Request $request)
    {
        if (!auth()->user() || !auth()->user()->is_admin) {
            abort(403, 'Acesso não autorizado.');
        }
        $product = new Produto;

        $product->nome = $request->nome;
        $product->descricao = $request->descricao;
        $product->preco = $request->preco;
        $product->estoque = $request->estoque;
        $product->categoria_id = $request->categoria_id;

        // Upload de imagem (opcional)
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $product->imagem = $imageName;
        }

        $product->save();

        return redirect('/products')->with('msg', 'Produto criado com sucesso!');
    }

    public function show($id)
    {
        $product = Produto::findOrFail($id);
        return view('products.show', ['product' => $product]);
    }

    public function edit($id)
    {
        $product = Produto::findOrFail($id);
        $categories = Categoria::all();
        return view('products.edit', ['product' => $product, 'categories' => $categories]);
    }

    public function update(Request $request, $id)
    {
        $data = $request->all();

        // Upload de imagem (opcional)
        if ($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $requestImage = $request->imagem;
            $extension = $requestImage->extension();
            $imageName = md5($requestImage->getClientOriginalName() . strtotime("now")) . "." . $extension;
            $requestImage->move(public_path('img/products'), $imageName);
            $data['imagem'] = $imageName;
        }

        Produto::findOrFail($id)->update($data);

        return redirect('/products')->with('msg', 'Produto atualizado com sucesso!');
    }

    public function destroy($id)
    {
        Produto::findOrFail($id)->delete();
        return redirect('/products')->with('msg', 'Produto removido com sucesso!');
    }
}