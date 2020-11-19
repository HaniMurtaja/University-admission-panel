<?php

use App\Ability;
use App\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $superAdmin = Role::create([
            'name' => 'Super Admin'
        ]);

        Role::create([
            'name' => 'student'
        ]);

        Role::create([
            'name' => 'university'
        ]);


        $abilities = Ability::all();

        $superAdmin->allowTo($abilities);
    }
}
