<?php

use App\CourseType;
use Illuminate\Database\Seeder;

class CourseTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CourseType::insert([
            [
                'name' => 'Post Graduate'
            ],
            [
                'name' => 'Under Graduate'
            ],
            [
                'name' => 'Foundation'
            ],
            [
                'name' => 'Pre-Masters'
            ]
        ]);
    }
}
