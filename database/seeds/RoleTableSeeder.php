<?php

use Illuminate\Database\Seeder;
use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->nombre = 'admin';
        $role->descripcion = 'Administrator';
        $role->save();     

        $role = new Role();
        $role->nombre = 'user';
        $role->descripcion = 'User';
        $role->save();
    }
}
