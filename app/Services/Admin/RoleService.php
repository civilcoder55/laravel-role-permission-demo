<?php

namespace App\Services\Admin;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Support\Facades\DB;

class RoleService
{

    public function getAllRoles()
    {
        return Role::cursorPaginate(16);
    }

    public function getAllPermissions()
    {
        return Permission::all();
    }

    public function getRolePermissionsIds($role)
    {
        $role_permissions = DB::table('roles_permissions')->select(['permission_id'])->where(['role_id' => $role->id])->get()->toArray();
        $role_permissions_ids =  array_map(function ($role_permission) {
            return $role_permission->permission_id;
        }, $role_permissions);

        return $role_permissions_ids;
    }

    public function storeRole($request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->permissions()->attach($request->permissions);
    }

    public function updateRole($request, $role)
    {
        $role->update(['name' => $request->name]);
        $role->permissions()->sync($request->permissions);
    }
}
