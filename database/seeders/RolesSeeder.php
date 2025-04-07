<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       //create role "Employee" for users
        $roles = [
            'Client',
            'Admin',
            
        // Add more roles as needed
        ];

        foreach ($roles as $role) {
            $existed_role=Role::where('name' , $role)->first();
            if(!$existed_role){
                Role::create(['name' => $role]);
            }
        }
        $admin_role = Role::where('name','Admin')->first();
        

        $permissions = Permission::pluck('id', 'id')->all();

        $admin_role->syncPermissions($permissions);
        $user1 = User::create([
            'first_name' => 'Admin1',
            'last_name' => 'Admin1',
            'email' => 'enovowheel@gmail.com',
           
            'phone' => null,
            'theme' =>'theme1',
            'password' => Hash::make('gmadmin159!48@26#1'),
        ]);
        $user2 = User::create([
            'first_name' => 'Admin2',
            'last_name' => 'Admin2',
            'email' => 'enovowheel2@gmail.com',
           
            'phone' => null,
            'theme' =>'theme1',
            'password' => Hash::make('gmadmin159!48@26#2'),
        ]);
        

        

        $user1->assignRole([$admin_role->id]);
        $user2->assignRole([$admin_role->id]);
     

        
    }
}