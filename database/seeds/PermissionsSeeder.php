<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions_array = [];
        array_push($permissions_array, Permission::create(['name' => 'create_books']));
        array_push($permissions_array, Permission::create(['name' => 'edit_books']));
        array_push($permissions_array, Permission::create(['name' => 'delete_books']));
        $viewBooksPermission = Permission::create(['name' => 'view_books']);
        array_push($permissions_array, $viewBooksPermission);
        $superAdminRole = Role::create(['name' => 'super_admin']);
        $superAdminRole->syncPermissions($permissions_array);
        $viewBooksRole = Role::create(['name' => 'view_books']);
        $viewBooksRole->givePermissionTo($viewBooksPermission);

        $userSuperAdmin = User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        //assign role
        $userSuperAdmin->assignRole('super_admin');
        //create user
        $userViewBooks = User::create([
            'name' => 'test',
            'email' => 'test@gmail.com',
            'password' => Hash::make('admin'),
        ]);
        //assign role
        $userViewBooks->assignRole('view_books');
        User::create([
            'name' => 'test2',
            'email' => 'test2@gmail.com',
            'password' => Hash::make('admin'),
        ]);
    }
}
