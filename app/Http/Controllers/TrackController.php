<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TrackController
{

    public function index(): JsonResponse {
        $albums = Track::with('album')->get();

        return response()->json([
           'data' => $albums
        ]);
    }
    public function store(Request $request){
        $album = Album::find($request->album_id);

        if(!$album) {
            return response()->json([
                'status' => 404,
                'message'=> 'Album não encontrado.',
            ]);
        }

        $track = Track::create([
            'name' => $request->name,
            'duration' => $request->duration,
            'album_id' => $request->album_id
        ]);

        return response()->json([
            "track" => $track
        ]);
    }

    public function findByName(Request $request): JsonResponse {
        $track = Track::whereLike('name', "%$request->name%")->get();

        return response()->json([
            'track' => $track
        ]);
    }

    public function delete(Request $request): JsonResponse {
        $track = Track::find($request->id);

        if(!$track) {
            return response()->json([
                'status' => 404,
                'message'=> 'faixa não encontrada.',
            ]);
        }

        Track::destroy($request->id);

        return response()->json([
            'deleted' => true
        ]);
    }

}
