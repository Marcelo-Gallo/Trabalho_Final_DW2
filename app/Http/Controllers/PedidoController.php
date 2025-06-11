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
        $cart = session()->get('cart', []);

        $productId = $request->produto_id;
        $quantity = $request->quantidade ?? 1;

        if (isset($cart[$productId])) {
            $cart[$productId] += $quantity;
        } else {
            $cart[$productId] = $quantity;
        }

        session(['cart' => $cart]);

        return redirect()->back()->with('msg', 'Produto adicionado ao carrinho!');
    }

    public function viewCart()
    {
        $cart = session()->get('cart', []);
        $products = \App\Models\Produto::whereIn('id', array_keys($cart))->get();

        return view('pedidos.cart', ['products' => $products, 'cart' => $cart]);
    }


    public function checkout()
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/products')->with('msg', 'Seu carrinho está vazio!');
        }

        $products = \App\Models\Produto::whereIn('id', array_keys($cart))->get();
        return view('pedidos.checkout', ['products' => $products, 'cart' => $cart]);
    }

    public function store(Request $request)
    {
        $cart = session()->get('cart', []);
        if (empty($cart)) {
            return redirect('/products')->with('msg', 'Seu carrinho está vazio!');
        }

        $pedido = new \App\Models\Pedido();
        $pedido->user_id = Auth::id();
        $pedido->status = 'Pendente';
        $pedido->save();

        foreach ($cart as $productId => $quantity) {
            $product = \App\Models\Produto::find($productId);
            $pedido->produtos()->attach($productId, [
                'quantidade' => $quantity,
                'preco_unitario' => $product->preco,
            ]);
        }

        session()->forget('cart');

        return redirect('/pedidos')->with('msg', 'Pedido realizado com sucesso!');
    }

}