<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Resetar cache de permissões
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // Criar permissões se não existirem
        $permissions = ['access user page', 'create reports'];
        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Criar papel e atribuir permissões
        $role = Role::firstOrCreate(['name' => 'user']);
        $role->syncPermissions($permissions);

        // Criar usuário e atribuir papel
        $user = User::firstOrCreate(
            ['usuario' => 'admin'],
            [
                'name' => 'admin',
                'senha' => bcrypt('administrador'),
            ]
        );

        if ($user) {
            $user->assignRole('user');
        }
    }
}