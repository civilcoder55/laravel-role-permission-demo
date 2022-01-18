<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Services\User\AlbumService;

class HomeController extends Controller
{
    protected $service;


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AlbumService $service)
    {
        $this->service = $service;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $albums = $this->service->getPublicAlbums();
        return view('user.home', compact('albums'));
    }
}
