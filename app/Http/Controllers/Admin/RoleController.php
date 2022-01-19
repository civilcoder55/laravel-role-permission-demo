<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\RolesRequest;
use App\Models\Role;
use App\Services\RoleService;

class RoleController extends Controller
{

    protected $service;

    public function __construct(RoleService $service)
    {
        $this->service = $service;
        $this->middleware('super_admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $roles = $this->service->getAllRoles();

        return view('admin.role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $permissions = $this->service->getAllPermissions();
        return view('admin.role.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RolesRequest $request)
    {
        $this->service->storeRole($request);
        return redirect()->route('admin.roles.index')->with('status', "Role created successfully");
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        $permissions = $this->service->getAllPermissions();
        $role_permissions_ids = $this->service->getRolePermissionsIds($role);
        return view('admin.role.edit', compact(['permissions', 'role', 'role_permissions_ids']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RolesRequest $request, Role $role)
    {
        $this->service->updateRole($request, $role);
        return redirect()->route('admin.roles.index')->with('status', "Role updated successfully");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        $role->delete();
        return redirect()->route('admin.roles.index')->with('status', "Role deleted successfully");
    }
}
