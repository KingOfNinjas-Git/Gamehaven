<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GameRequest;
use App\Models\Game;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

/** Adding, editing and deleting games. The list of games is the public offers page (GameController). */
class GameAdminController extends Controller
{
    public function create(): View
    {
        return view('admin.create');
    }

    public function store(GameRequest $request): RedirectResponse
    {
        $data = $request->validated();
        $data['cover_image'] = $request->file('cover_image')->store('game_covers', 'public');

        Game::create($data);

        return redirect()->route('ofertas')->with('success', 'Jogo adicionado!');
    }

    public function edit(Game $game): View
    {
        return view('admin.edit', compact('game'));
    }

    public function update(GameRequest $request, Game $game): RedirectResponse
    {
        $data = $request->validated();

        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($game->cover_image);
            $data['cover_image'] = $request->file('cover_image')->store('game_covers', 'public');
        } else {
            unset($data['cover_image']);
        }

        $game->update($data);

        return redirect()->route('ofertas')->with('success', 'Jogo atualizado!');
    }

    public function destroy(Game $game): RedirectResponse
    {
        Storage::disk('public')->delete($game->cover_image);
        $game->delete();

        return redirect()->route('ofertas')->with('success', 'Jogo apagado!');
    }
}
