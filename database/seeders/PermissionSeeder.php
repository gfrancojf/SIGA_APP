<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\PermissionRegistrar;
use Spatie\Permission\Models\Role;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // spatie documentation
        app()->make(PermissionRegistrar::class)->forgetCachedPermissions();

        $permissions = [
            'permission_index', 'permission_create','permission_show','permission_edit','permission_destroy',

            'role_index','role_create','role_show','role_edit','role_destroy',

            'user_index','user_create','user_show','user_edit','user_destroy',

            'branch_index','branch_create','branch_show','branch_edit', 'branch_destroy',

            'departament_index', 'departament_create','departament_show','departament_edit','departament_destroy',

            'employee_index','employee_create','employee_show','employee_edit','employee_destroy',
            
            'location_index','location_create','location_show','location_edit','location_destroy',
 ];

        foreach ($permissions as $permission) {
            Permission::create([
                'name' => $permission
            ]);
        }
    }
}
