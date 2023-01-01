<?php

namespace Database\Seeders;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\User;
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

       Role::create(['name' => 'Super-Admin']);
       Role::create(['name' => 'Admin']);
       Role::create(['name' => 'Standart-User']);

        //$role = User::where('id', 12)->first();
       // $permission = Permission::create(['name' => 'UpdateUser']);
       // $role->givePermissionTo($permission);

    }
}
