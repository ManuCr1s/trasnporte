<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Permission::create(['name' => 'View User']);
        Permission::create(['name' => 'Edit User']);
        Permission::create(['name' => 'Delete User']);
        Permission::create(['name' => 'Create User']);
        $adminUser = User::query()->create([
            'dni' => '00000000',
            'name' => 'ADMIN',
            'lastname' => 'ADMINISTRADOR',
            'password' =>Hash::make('00000000')
        ]);
        $role = Role::firstOrCreate(['name'=>'admin']);
        $permissionAdmin = Permission::query()->pluck('name');
        $role->syncPermissions($permissionAdmin);
        //$role = Role::firtsOrCreate(['name' => 'admin']);
        $adminUser->assignRole($role);
    }
}
