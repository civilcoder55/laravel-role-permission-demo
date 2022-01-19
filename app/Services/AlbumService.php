<?php

namespace App\Services;

use App\Models\Album;
use App\Models\User;
use Illuminate\Support\Str;

class AlbumService
{


    public function getUserAlbums()
    {
        /**
         * @var User
         */
        $user = auth()->user();
        return $user->albums()->cursorPaginate(10);
    }

    public function getPublicAlbums()
    {
        return Album::where(['private' => 0])->cursorPaginate(16);
    }

    public function getAllAlbums()
    {
        return Album::cursorPaginate(10);
    }

    public function getAllAlbumsWithUsers()
    {
        return Album::with('user')->cursorPaginate(10);
    }

    public function getAlbumsCount()
    {
        return Album::count();
    }


    public function storeAlbum($request)
    {
        /**
         * @var User
         */
        $user = auth()->user();
        $file = $request->file('cover');
        $fileName = md5(Str::random(40) . microtime()) . "." . $file->getClientOriginalExtension();
        $file->storeAs('public', $fileName); // save at storage/app/public/{name}
        $user->albums()->create([
            'name' => $request->name,
            'description' => $request->description,
            'private' => $request->has('private') ? 1 : 0,
            'cover_image' => asset("storage/$fileName"),
        ]);
    }

    public function updateAlbum($request, $album)
    {
        $newAlbum = [
            'name' => $request->name,
            'description' => $request->description,
            'private' => $request->has('private') ? 1 : 0,
        ];

        if ($file = $request->file('cover')) {
            $fileName = md5(Str::random(40) . microtime()) . "." . $file->getClientOriginalExtension();
            $file->storeAs('public', $fileName); // save at storage/app/public/{name}
            $newAlbum['cover_image'] = asset("storage/$fileName");
        }

        $album->update($newAlbum);
    }
}
