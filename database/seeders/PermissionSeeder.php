<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [];
        foreach (config('permissions') as $permission) {
            $permissions[] = ['name' => $permission];
        }

        Permission::insert($permissions);
    }
}
