<?php

namespace App\Http\Controllers;

use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GameController extends Controller
{
    /** The offers page: every game, or the ones in the chosen category. */
    public function index(Request $request): View
    {
        $selectedCategory = $request->query('category');

        return view('ofertas', [
            'games' => Game::inCategory($selectedCategory)->get(),
            'categories' => Game::CATEGORIES,
            'selectedCategory' => $selectedCategory,
        ]);
    }
}
