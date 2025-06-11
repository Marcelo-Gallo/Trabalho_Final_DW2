<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pedido;
use Illuminate\Support\Facades\Auth;

class PedidoController extends Controller
{
    public function index()
    {
        $pedidos = Auth::user()->pedidos()->with('produtos')->get();
        return view('pedidos.index', ['pedidos' => $pedidos]);
    }

    public function show($id)
    {
        $pedido = Pedido::with('produtos')->findOrFail($id);
        // Opcional: garantir que o pedido pertence ao usuário autenticado
        if ($pedido->user_id !== Auth::id()) {
            abort(403);
        }
        return view('pedidos.show', ['pedido' => $pedido]);
    }


    public function addToCart(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect('/products')->with('msg', 'Administradores não podem efetuar compras.');
        }
        $produtoId = $request->produto_id;
        $quantidade = $request->quantidade ?? 1;

        // Busca ou cria o carrinho do usuário
        $carrinho = $user->carrinho()->firstOrCreate(['user_id' => $user->id]);

        // Adiciona ou atualiza o produto no carrinho
        $existing = $carrinho->produtos()->where('produto_id', $produtoId)->first();
        if ($existing) {
            $carrinho->produtos()->updateExistingPivot($produtoId, [
                'quantidade' => $existing->pivot->quantidade + $quantidade
            ]);
        } else {
            $carrinho->produtos()->attach($produtoId, ['quantidade' => $quantidade]);
        }

        return redirect()->back()->with('msg', 'Produto adicionado ao carrinho!');
    }

    public function viewCart()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect('/products')->with('msg', 'Administradores não podem efetuar compras.');
        }
        $carrinho = $user->carrinho;
        $produtos = $carrinho ? $carrinho->produtos : collect();

        return view('pedidos.cart', [
            'products' => $produtos,
            'cart' => $carrinho ? $carrinho->produtos->pluck('pivot.quantidade', 'id')->toArray() : []
        ]);
    }


    public function checkout()
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect('/products')->with('msg', 'Administradores não podem efetuar compras.');
        }
        $carrinho = $user->carrinho;
        $products = $carrinho ? $carrinho->produtos : collect();
        $cart = $carrinho ? $carrinho->produtos->pluck('pivot.quantidade', 'id')->toArray() : [];

        if ($products->isEmpty()) {
            return redirect('/products')->with('msg', 'Seu carrinho está vazio!');
        }

        return view('pedidos.checkout', ['products' => $products, 'cart' => $cart]);
    }

    public function store(Request $request)
    {
        $user = auth()->user();
        if ($user->is_admin) {
            return redirect('/products')->with('msg', 'Administradores não podem efetuar compras.');
        }
        $carrinho = $user->carrinho;
        $cart = $carrinho ? $carrinho->produtos->pluck('pivot.quantidade', 'id')->toArray() : [];
        $products = $carrinho ? $carrinho->produtos : collect();

        if (empty($cart)) {
            return redirect('/products')->with('msg', 'Seu carrinho está vazio!');
        }

        $pedido = new \App\Models\Pedido();
        $pedido->user_id = $user->id;
        $pedido->status = 'Pendente';
        $pedido->data_pedido = now();
        $pedido->total = $products->sum(function($product) use ($cart) {
            return ($cart[$product->id] ?? $product->pivot->quantidade) * $product->preco;
        });
        $pedido->save();

        foreach ($cart as $productId => $quantity) {
            $product = $products->find($productId);
            $pedido->produtos()->attach($productId, [
                'quantidade' => $quantity,
                'preco_unitario' => $product->preco,
            ]);
        }

        // Limpa o carrinho do usuário
        $carrinho->produtos()->detach();

        return redirect('/pedidos')->with('msg', 'Pedido realizado com sucesso!');
    }

}