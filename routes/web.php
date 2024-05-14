<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PlaylistController;
use App\Http\Controllers\SongsController;
use App\Http\Middleware\IsAdmin;

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/playlists', [PlaylistController::class, 'index'])->name('playlist');
Route::get('/playlists/{playlist}/show', [PlaylistController::class, 'show'])->name('playlist.show');
Route::get('/playlists/{playlist}/edit', [PlaylistController::class, 'edit'])->name('playlist.edit')->middleware(IsAdmin::class);
Route::put('/playlists/{playlist}/update', [PlaylistController::class, 'update'])->name('playlist.update')->middleware(IsAdmin::class);
Route::delete('/playlists/{playlist}/destroy', [PlaylistController::class, 'destroy'])->name('playlist.destroy')->middleware(IsAdmin::class);
Route::get('/playlists/create', [PlaylistController::class, 'create'])->name('playlist.create')->middleware(IsAdmin::class);
Route::post('/playlists', [PlaylistController::class, 'store'])->name('playlist.store')->middleware(IsAdmin::class);

Route::get('/songs', [SongsController::class, 'index'])->name('songs');
Route::get('/songs/{song}/show', [SongsController::class, 'show'])->name('song.show');
Route::get('/songs/{song}/edit', [SongsController::class, 'edit'])->name('song.edit')->middleware(IsAdmin::class);
Route::put('/songs/{song}/update', [SongsController::class, 'update'])->name('song.update')->middleware(IsAdmin::class);
Route::delete('/songs/{song}/destroy', [SongsController::class, 'destroy'])->name('song.destroy')->middleware(IsAdmin::class);
Route::get('/songs/create', [SongsController::class, 'create'])->name('song.create')->middleware(IsAdmin::class);
Route::post('/songs', [SongsController::class, 'store'])->name('song.store')->middleware(IsAdmin::class);


require __DIR__ . '/auth.php';
