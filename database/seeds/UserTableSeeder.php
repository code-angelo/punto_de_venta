<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('nombre', 'user')->first();
        $role_admin = Role::where('nombre', 'admin')->first(); 
        $contra = 'query';      

        $user = new User();
        $user->nombre = 'Luigi';
        $user->apellido = 'Gomez';
        $user->telefono = '4661183188';
        $user->estatus = '1';
        $user->email = 'user@example.com';
        $user->password = Hash::make($contra);
        $user->save();
        $user->roles()->attach($role_user); 

        $user = new User();
        $user->nombre = 'Adrian';
        $user->apellido = 'Lopez';
        $user->telefono = '4561183188';
        $user->estatus = '1';
        $user->email = 'admin@example.com';
        $user->password = Hash::make($contra);
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
