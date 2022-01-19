<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\AlbumsRequest;
use App\Models\Album;
use App\Services\AlbumService;

class AlbumController extends Controller
{
    protected $service;

    public function __construct(AlbumService $service)
    {
        $this->service = $service;
        $this->middleware('permission:list-album', ['only' => ['index']]);
        $this->middleware('permission:edit-album', ['only' => ['edit', 'update']]);
        $this->middleware('permission:delete-album', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = $this->service->getAllAlbumsWithUsers();

        return view('admin.album.index', compact('albums'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Album $album)
    {
        return view('admin.album.edit', compact('album'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AlbumsRequest $request, Album $album)
    {
        $this->service->updateAlbum($request, $album);
        return redirect()->route('admin.albums.index')->with('status', "Album updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Album $album)
    {
        $album->delete();
        return redirect()->route('user.albums.index')->with('status', "Album deleted successfully");
    }
}
