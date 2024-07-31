<?php

namespace App\Http\Controllers;

use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController
{
    public function index() {
        $artist = Artist::with('albums')->get();

        return response()->json([
            'artist' => $artist
        ]);


    }
}
