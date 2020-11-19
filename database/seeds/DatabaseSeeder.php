<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(AbilitySeeder::class);
        $this->call(RoleSeeder::class);
        $this->call(UniversitySeeder::class);
        $this->call(CourseTypeSeeder::class);
        $this->call(UserSeeder::class);
    }
}
