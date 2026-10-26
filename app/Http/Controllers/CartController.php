<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function index()
    {
        $cart = session('cart', []);
        return view('cart', compact('cart'));
    }

    public function add(Request $request, \App\Models\Game $game)
    {
        $cart = session()->get('cart', []);
        $cart[$game->id] = [
            'id' => $game->id,
            'title' => $game->title,
            'price' => $game->price,
            'cover_image' => $game->cover_image,
        ];
        session(['cart' => $cart]);
        return redirect()->back()->with('success', 'Jogo adicionado ao carrinho!');
    }
}
