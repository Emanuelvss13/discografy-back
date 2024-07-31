<?php

namespace App\Http\Controllers;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Track;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AlbumController
{


    public function index(): JsonResponse {
        $albums = Album::with('tracks')->get();

        return response()->json([
           'data' => $albums
        ]);
    }

    public function findByName(Request $request): JsonResponse {
        $album = Album::whereLike('name', "%$request->name%")->with('tracks')->get();

        return response()->json([
            'data' => $album
        ]);
    }

    public function store(Request $request): JsonResponse {

        $TiaoAndPardinho = 1;

        $album = Album::create([
            'artist_id' => $TiaoAndPardinho,
            'name' => $request->name,
        ]);

        if($request->tracks !== null) {
            foreach ($request->tracks as $track) {
                Track::create([
                    'name' => $track['name'],
                    'duration' => $track['duration'],
                    'album_id' => $album->id

                ]);
            };
        }

        return response()->json([
            'data' => $album,
        ]);
    }

    public function delete(Request $request): JsonResponse {
        $album = Album::find($request->id);

        if(!$album) {
            return response()->json([
                'status' => 404,
                'message'=> 'Album não encontrado.',
            ]);
        }

        Album::destroy($request->id);

        return response()->json([
            'deleted' => true
        ]);
    }

    public function findAlbumById(Request $request): JsonResponse {
        $album = Album::with('tracks')->find($request->id);

        return response()->json([
            'data' => $album,
        ]);
    }

}
