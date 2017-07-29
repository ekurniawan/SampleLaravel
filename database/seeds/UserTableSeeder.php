<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_employee = Role::where('name','employee')->first();
        $role_manager = Role::where('name','manager')->first();

        $employee = new User();
        $employee->name = 'Erick';
        $employee->email = 'erick@actual-training.com';
        $employee->password = bcrypt('rahasia');
        $employee->save();
        $employee->roles()->attach($role_employee);

        $manager = new User();
        $manager->name = 'Jovan';
        $manager->email = 'jovan@actual-training.com';
        $manager->password = bcrypt('rahasia');
        $manager->save();
        $manager->roles()->attach($role_manager);
    }
}
