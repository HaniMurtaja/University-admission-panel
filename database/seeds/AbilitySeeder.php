<?php

use App\Ability;
use Illuminate\Database\Seeder;

class AbilitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Ability::insert([
            [
                'name' => 'show-students',
                'label' => 'Show Students'
            ],
            [
                'name' => 'show-single-student',
                'label' => 'Show Single Student'
            ],
            [
                'name' => 'download-student-pdf',
                'label' => 'Download Student info (pdf)'
            ],


            [
                'name' => 'show-universities',
                'label' => 'Show Universities'
            ],
            [
                'name' => 'add-university',
                'label' => 'Add University'
            ],
            [
                'name' => 'edit-university',
                'label' => 'Edit University'
            ],
            [
                'name' => 'delete-university',
                'label' => 'Delete University'
            ],
            [
                'name' => 'show-courses',
                'label' => 'Show Courses'
            ],
            [
                'name' => 'add-course',
                'label' => 'Add Course'
            ],
            [
                'name' => 'edit-course',
                'label' => 'Edit Course'
            ],
            [
                'name' => 'delete-course',
                'label' => 'Delete Course'
            ],
            [
                'name' => 'show-course-types',
                'label' => 'Show Course Types'
            ],
            [
                'name' => 'add-course-type',
                'label' => 'Add Course Type'
            ],
            [
                'name' => 'edit-course-type',
                'label' => 'Edit Course Type'
            ],
            [
                'name' => 'delete-course-type',
                'label' => 'Delete Course Type'
            ],

            [
                'name' => 'show-course-categories',
                'label' => 'Show Course Categories'
            ],
            [
                'name' => 'add-course-category',
                'label' => 'Add Course Category'
            ],
            [
                'name' => 'edit-course-category',
                'label' => 'Edit Course Category'
            ],
            [
                'name' => 'delete-course-category',
                'label' => 'Delete Course Category'
            ],


            [
                'name' => 'show-users',
                'label' => 'Show Users'
            ],
            [
                'name' => 'edit-user-roles',
                'label' => 'Edit User Role'
            ],
            [
                'name' => 'delete-user',
                'label' => 'Delete User'
            ]
        ]);

        Ability::create([
            'name' => 'show-roles',
            'label' => 'Show Roles'
        ]);
        Ability::create([
            'name' => 'add-role',
            'label' => 'Add Role'
        ]);

        Ability::create([
            'name' => 'edit-role',
            'label' => 'Edit Role'
        ]);
        Ability::create([
            'name' => 'delete-role',
            'label' => 'Delete Role'
        ]);
    }
}
