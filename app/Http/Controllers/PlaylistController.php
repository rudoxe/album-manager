<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use Illuminate\Http\Request;

class PlaylistController extends Controller
{
    public function index()
    {
        $playlists = Playlist::where('user_id', auth()->user()->id)->get();
        return view('playlist.index', [
            'playlists' => $playlists,
        ]);
    }

    public function create()
    {
        return view('playlist.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Playlist::create([
            'name' => $request->name,
            'user_id' => auth()->user()->id,
        ]);

        return redirect()->route('playlist');
    }

    public function show(Playlist $playlist)
    {
        return view('playlist.show', [
            'playlist' => $playlist,
        ]);
    }

    public function edit(Playlist $playlist)
    {
        return view('playlist.edit', [
            'playlist' => $playlist,
        ]);
    }

    public function update(Request $request, Playlist $playlist)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $playlist->update([
            'name' => $request->name,
        ]);

        return redirect()->route('playlist');
    }

    public function destroy(Playlist $playlist)
    {
        $playlist->delete();

        return redirect()->route('playlist');
    }
}
