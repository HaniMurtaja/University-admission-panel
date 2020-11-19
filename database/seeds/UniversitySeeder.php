<?php

use App\University;
use Illuminate\Database\Seeder;

class UniversitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        University::insert([
            [
                'name' => 'Oxford',
                'institution_type' => 'private',
                'founding_year' => 2000,
                'website' => 'oxford.com',
                'image' => 'default.png',
                'about' => 'test'
            ],
            [
                'name' => 'Stanford',
                'institution_type' => 'private',
                'founding_year' => 2001,
                'website' => 'Stanford.com',
                'image' => 'default.png',
                'about' => 'test'
            ],
        ]);
    }
}
