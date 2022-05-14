<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Permission::create(['name' => 'edit economic articles']);
        Permission::create(['name' => 'delete economic articles']);
        Permission::create(['name' => 'publish economic articles']);
        Permission::create(['name' => 'unpublish economic articles']);

        Permission::create(['name' => 'edit criminal articles']);
        Permission::create(['name' => 'delete criminal articles']);
        Permission::create(['name' => 'publish criminal articles']);
        Permission::create(['name' => 'unpublish criminal articles']);

        Permission::create(['name' => 'edit labor articles']);
        Permission::create(['name' => 'delete labor articles']);
        Permission::create(['name' => 'publish labor articles']);
        Permission::create(['name' => 'unpublish labor articles']);

        Permission::create(['name' => 'edit administrative articles']);
        Permission::create(['name' => 'delete administrative articles']);
        Permission::create(['name' => 'publish administrative articles']);
        Permission::create(['name' => 'unpublish administrative articles']);

        Permission::create(['name' => 'edit real estate articles']);
        Permission::create(['name' => 'delete real estate articles']);
        Permission::create(['name' => 'publish real estate articles']);
        Permission::create(['name' => 'unpublish real estate articles']);

        $role = Role::create(['name' => 'admin'])->givePermissionTo(Permission::all());
        $role = Role::create(['name' => 'Cliente']);
        $role = Role::create(['name' => 'Abogado']);

        $role = Role::create(['name' => 'Derecho Civil'])
                ->givePermissionTo(['edit economic articles', 'delete economic articles', 'publish economic articles', 'unpublish economic articles']);

        $role = Role::create(['name' => 'Derecho Penal'])
                ->givePermissionTo(['edit criminal articles', 'delete criminal articles', 'publish criminal articles', 'unpublish criminal articles']);

        $role = Role::create(['name' => 'Derecho Laboral'])
                ->givePermissionTo(['edit labor articles', 'delete labor articles', 'publish labor articles', 'unpublish labor articles']);

        $role = Role::create(['name' => 'Derecho Administrativo'])
                ->givePermissionTo(['edit administrative articles', 'delete administrative articles', 'publish administrative articles', 'unpublish administrative articles']);

        $role = Role::create(['name' => 'Derecho Patrimonial'])
                ->givePermissionTo(['edit real estate articles', 'delete real estate articles', 'publish real estate articles', 'unpublish real estate articles']);


        //
    }
}
