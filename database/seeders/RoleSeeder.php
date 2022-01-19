<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::create(['name' => 'user']);

        $role->permissions()->attach(Permission::whereIn('name', ['create-album', 'edit-album', 'delete-album', 'list-album'])->get());
    }
}
