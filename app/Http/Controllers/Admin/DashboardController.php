<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Services\User\AlbumService;
use Illuminate\Http\Request;

class DashboardController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $statistics = $this->service->getAdminStatistics();

        return view('admin.dashboard', compact('statistics'));
    }
}
