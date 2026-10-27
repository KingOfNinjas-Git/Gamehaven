<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\View\View;

/** The cart lives in the session: a game is in it once, with the title and price it had when it was added. */
class CartController extends Controller
{
    public function index(): View
    {
        return view('cart', ['cart' => session('cart', [])]);
    }

    public function add(Game $game): RedirectResponse
    {
        session()->put("cart.{$game->id}", [
            'id' => $game->id,
            'title' => $game->title,
            'price' => $game->price,
            'cover_image' => $game->cover_image,
        ]);

        return back()->with('success', 'Jogo adicionado ao carrinho!');
    }
}
