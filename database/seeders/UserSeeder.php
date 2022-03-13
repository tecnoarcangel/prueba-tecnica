<?php

namespace Database\Seeders;

use App\Models\User;
use Database\Factories\UserFactory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $super_admin = User::create(
            [
                'name' => 'Super Admin',
                'email' => 'soporte@grupoperinola.com',
                'password' => Hash::make('lAbs_124215@3'),
                'activo' => 1,
            ]
        );

        $admin = User::create(
            [
                'name' => 'Luis Mendez',
                'email' => 'luis.mendez@grupoperinola.com',
                'password' => Hash::make('lAbs_124215@3'),
                'activo' => 1,
            ]
        );

        $usuario = User::create(
            [
                'name' => 'Uriel Arana',
                'email' => 'uriel@grupoperinola.com',
                'password' => Hash::make('lAbs_124215@3'),
                'activo' => 1,
            ]
        );

        $super_admin->assignRole('Super Admin');
        $admin->assignRole('Admin');
        $usuario->assignRole('Usuario');

        User::factory()
            ->count(15)
            ->create();
    }
}
