<?php

use App\Http\Controllers\AlbumController;
use App\Http\Controllers\ArtistController;
use App\Http\Controllers\TrackController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return response()->json([
        'status' => true,
        'message' => 'List Discs'
    ]);
});

Route::get('/artists', [ArtistController::class, 'index']);

Route::get('/albums', [AlbumController::class, 'index']);
Route::get('/album-by-name', [AlbumController::class, 'findByName']);
Route::post('/album', [AlbumController::class, 'store']);
Route::delete('/album', [AlbumController::class, 'delete']);
Route::get('/album-by-id', [AlbumController::class, 'findAlbumById']);

Route::post('/track', [TrackController::class, 'store']);
Route::get('/tracks', [TrackController::class, 'index']);
Route::delete('/track', [TrackController::class, 'delete']);
Route::get('/track', [TrackController::class, 'findByName']);



