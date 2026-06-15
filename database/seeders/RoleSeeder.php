<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [
            // Posts / Blog
            'posts.index',
            'posts.create',
            'posts.edit',
            'posts.destroy',

            // Users / Admin
            'users.index',
            'users.create',
            'users.edit',
            'users.destroy',
            
            // Services / Admin
            'services.index',
            'services.create',
            'services.edit',
            'services.destroy',

            // Categories / Blog
            'categories.index',
            'categories.create',
            'categories.edit',
            'categories.destroy',

            // Comments / Blog
            'comments.index',
            'comments.create',
            'comments.edit',
            'comments.destroy',

            // Roles / Admin
            'roles.index',
            'roles.create',
            'roles.edit',
            'roles.destroy',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }

        // Users authenticated as admin
        $role = Role::firstOrCreate(['name' => 'admin']);
        $role->givePermissionTo($permissions);

        // Users authenticated with editor permissions
        $role = Role::firstOrCreate(['name' => 'editor']);
        $role->givePermissionTo('posts.index');
        $role->givePermissionTo('posts.create');
        $role->givePermissionTo('posts.edit');
        $role->givePermissionTo('posts.destroy');
        $role->givePermissionTo('categories.index');
        $role->givePermissionTo('categories.create');
        $role->givePermissionTo('categories.edit');
        $role->givePermissionTo('categories.destroy');

        // Users authenticated without admin permissions
        $role = Role::firstOrCreate(['name' => 'user']);
        $role->givePermissionTo('comments.index');
        $role->givePermissionTo('comments.create');
        $role->givePermissionTo('comments.edit');
        $role->givePermissionTo('comments.destroy');
    }
}
