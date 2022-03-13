<?php

namespace Database\Seeders;

use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class RolesPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();
        // USUARIOS

        $super_admin    = Role::create(['name' => 'Super Admin','guard_name' => 'web']);
        $admin          = Role::create(['name' => 'Admin','guard_name' => 'web']);
        $usuario        = Role::create(['name' => 'Usuario','guard_name' => 'web']);

        // create usuarios permissions
        $ver_usuarios       = Permission::create(['name' => 'Ver Usuarios','guard_name' => 'web']);
        $create_usuarios    = Permission::create(['name' => 'Crear Usuarios','guard_name' => 'web']);
        $edit_usuarios      = Permission::create(['name' => 'Editar Usuarios','guard_name' => 'web']);
        $delete_usuarios    = Permission::create(['name' => 'Eliminar Usuarios','guard_name' => 'web']);

        // create roles permissions
        $ver_roles          = Permission::create(['name' => 'Ver Roles','guard_name' => 'web']);
        $create_roles       = Permission::create(['name' => 'Crear Roles','guard_name' => 'web']);
        $edit_roles         = Permission::create(['name' => 'Editar Roles','guard_name' => 'web']);
        $delete_roles       = Permission::create(['name' => 'Eliminar Roles','guard_name' => 'web']);

        // create permisos permissions
        $ver_permisos       = Permission::create(['name' => 'Ver Permisos','guard_name' => 'web']);
        $create_permisos    = Permission::create(['name' => 'Crear Permisos','guard_name' => 'web']);
        $edit_permisos      = Permission::create(['name' => 'Editar Permisos','guard_name' => 'web']);
        $delete_permisos    = Permission::create(['name' => 'Eliminar Permisos','guard_name' => 'web']);

        // create páginas permissions
        $ver_paginas        = Permission::create(['name' => 'Ver Paginas','guard_name' => 'web']);
        $create_paginas     = Permission::create(['name' => 'Crear Paginas','guard_name' => 'web']);
        $edit_paginas       = Permission::create(['name' => 'Editar Paginas','guard_name' => 'web']);
        $delete_paginas     = Permission::create(['name' => 'Eliminar Paginas','guard_name' => 'web']);

        // create suscriptores permissions
        $ver_suscriptores        = Permission::create(['name' => 'Ver Suscriptores','guard_name' => 'web']);
        $create_suscriptores     = Permission::create(['name' => 'Crear Suscriptores','guard_name' => 'web']);
        $edit_suscriptores       = Permission::create(['name' => 'Editar Suscriptores','guard_name' => 'web']);
        $delete_suscriptores     = Permission::create(['name' => 'Eliminar Suscriptores','guard_name' => 'web']);

        $super_admin->givePermissionTo(
            [
                $ver_paginas,$ver_permisos, $ver_roles, $ver_usuarios, $ver_suscriptores,
                $create_paginas,$create_permisos, $create_roles, $create_usuarios, $create_suscriptores,
                $edit_paginas,$edit_permisos, $edit_roles, $edit_usuarios, $edit_suscriptores,
                $delete_paginas,$delete_permisos, $delete_roles, $delete_usuarios, $delete_suscriptores,
            ]
        );
        $admin->givePermissionTo(
            [
                $ver_paginas,$ver_permisos, $ver_roles, $ver_usuarios, $ver_suscriptores,
                $create_paginas,$create_permisos, $create_roles, $create_usuarios, $create_suscriptores,
                $edit_paginas,$edit_permisos, $edit_roles, $edit_usuarios, $edit_suscriptores,
            ]
        );
    }
}
