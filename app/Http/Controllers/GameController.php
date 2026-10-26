<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index(Request $request)
    {
        $categories = [
            'Featured', 'Action-Adventure', 'Arcade', 'Casual', 'Action',
            'Open-World', 'RPG', 'Horror', 'Strategy', 'Hack & Slash', 'Shooter', 'Racing'
        ];
        $selectedCategory = $request->query('category');

        $games = Game::when(
            $selectedCategory && $selectedCategory !== 'Featured',
            function ($query) use ($selectedCategory) {
                return $query->where('category', $selectedCategory);
            }
        )->get();

        return view('ofertas', compact('games', 'categories', 'selectedCategory'));
    }

    public function store(Request $request)
    {
        // ...validation and saving code...

        return redirect()->route('ofertas')->with('success', 'Jogo adicionado!');
    }

    public function update(Request $request, Game $game)
    {
        // ...validation and updating code...

        return redirect()->route('ofertas')->with('success', 'Jogo atualizado!');
    }
}
