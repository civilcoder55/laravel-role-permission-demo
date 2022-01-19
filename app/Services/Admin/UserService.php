<?php

namespace App\Services\Admin;

use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserService
{

    public function getAllUsers()
    {
        return User::where('super_admin', 0)->cursorPaginate(16);
    }

    public function getAllUsersCount()
    {
        return User::where('super_admin', 0)->count();
    }
    
    public function getAllAdmins()
    {
        return DB::table('users');
    }

    public function getUserRolesIds($user)
    {

        $user_roles = DB::table('users_roles')->select(['role_id'])->where(['user_id' => $user->id])->get()->toArray();
        $user_roles_ids =  array_map(function ($user_role) {
            return $user_role->role_id;
        }, $user_roles);

        return $user_roles_ids;
    }

    public function storeUser($request)
    {
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $user->roles()->attach($request->roles);
    }

    public function updateUser($request, $user)
    {
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];
        if ($request->has('password')) {
            $data['password'] = Hash::make($request->password);
        }
        $user->update($data);
        $user->roles()->sync($request->roles);
    }
}
