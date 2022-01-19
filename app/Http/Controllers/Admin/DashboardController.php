<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\Admin\UserService;
use App\Services\User\AlbumService;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    protected $AlbumService;
    protected $UserService;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(AlbumService $AlbumService, UserService $UserService)
    {
        $this->AlbumService = $AlbumService;
        $this->UserService = $UserService;
        $this->middleware('permission:view-dashboard', ['only' => ['index']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics =  [
            'albums_count' => $this->AlbumService->getAlbumsCount(),
            'users_count' => $this->UserService->getAllUsersCount(),
        ];;

        return view('admin.dashboard', compact('statistics'));
    }
}
