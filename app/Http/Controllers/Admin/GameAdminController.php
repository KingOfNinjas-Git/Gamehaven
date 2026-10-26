<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GameAdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'required|image',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
        ]);
        $data['cover_image'] = $request->file('cover_image')->store('game_covers', 'public');
        Game::create($data);
        return redirect()->route('ofertas')->with('success', 'Jogo adicionado!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)
    {
        return view('admin.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Game $game)
    {
        $data = $request->validate([
            'title' => 'required|string|max:255',
            'cover_image' => 'nullable|image',
            'price' => 'required|numeric',
            'discount' => 'nullable|numeric',
            'old_price' => 'nullable|numeric',
            'category' => 'nullable|string|max:255',
        ]);
        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($game->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('game_covers', 'public');
        }
        $game->update($data);
        return redirect()->route('ofertas')->with('success', 'Jogo atualizado!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        Storage::disk('public')->delete($game->cover_image);
        $game->delete();
        return redirect()->route('ofertas')->with('success', 'Jogo apagado!');
    }
}
