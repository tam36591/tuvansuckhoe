<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    public function run()
    {
        $role_manager = new Role();
        $role_manager->name = 'administrator';
        $role_manager->description = 'somebody who has access to all the administration features within a single site';
        $role_manager->save();

        $role_employee = new Role();
        $role_employee->name = 'editor';
        $role_employee->description = 'somebody who can publish and manage posts including the posts of other users';
        $role_employee->save();

        $role_employee = new Role();
        $role_employee->name = 'author';
        $role_employee->description = 'somebody who can publish and manage their own posts';
        $role_employee->save();
    }
}