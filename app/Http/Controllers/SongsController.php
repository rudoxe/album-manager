<?php

namespace App\Http\Controllers;

use App\Models\Playlist;
use App\Models\Songs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SongsController extends Controller
{
    public function index()
    {
        $songs = Songs::all();
        return view('songs.index', [
            'songs' => $songs,
        ]);
    }

    public function show($id)
    {
        $song = Songs::findOrFail($id);
        return view('songs.show', [
            'song' => $song,
        ]);
    }

    public function create()
    {
        $playlists = Playlist::where('user_id', auth()->user()->id)->get();
        return view('songs.create', [
            'playlists' => $playlists,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'path' => 'required|file|mimes:mpeg,ogg,mp4,mp3,webm,3gp,mov,flv,avi,wmv,ts|max:10000',
            'cover' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'duration' => 'required',
            'playlist_id' => 'required',
        ]);

        if ($request->hasFile('cover')) {
            $cover = $request->file('cover')->store(options: 'cover');
        }

        if ($request->hasFile('path')) {
            $path = $request->file('path')->store(options: 'path');
        }

        $request['user_id'] = auth()->user()->id;
        $songs = Songs::create([
            'title' =>$request->title ,
            'artist' => $request->artist,
            'album' => $request->album,
            'genre' => $request->genre,
            'year' => $request->year,
            'path' => $request->path,
            'cover' => $request->cover,
            'duration' => $request->duration,
            'path' => $path,
            'cover' => $cover,
            'playlist_id' => $request->playlist_id,
            'user_id' => $request['user_id'],
        ]);

        return redirect()->route('song.show', $songs->id);
    }

    public function edit($id)
    {
        $songs = Songs::findOrFail($id);
        return view('songs.edit', [
            'songs' => $songs,
        ]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'artist' => 'required',
            'album' => 'required',
            'genre' => 'required',
            'year' => 'required',
            'path' => 'required',
            'cover' => 'required',
            'duration' => 'required',
        ]);

        $request['user_id'] = auth()->user()->id;
        $songs = Songs::findOrFail($id);
        $songs->update($request->all());
        return redirect()->route('song.show', $songs->id);
    }

    public function destroy($id)
    {
        $songs = Songs::findOrFail($id);
        $songs->delete();
        return redirect()->route('songs');
    }
}
