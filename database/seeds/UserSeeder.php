<?php

use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Hani Murtaja',
            'email' => 'hani@gmail.com',
            'password' => bcrypt('123456')
        ]);

        $user->assignRole('Super Admin');

        $user2 = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('Administrator@2020$')
        ]);

        $user2->assignRole('Super Admin');
    }
}
