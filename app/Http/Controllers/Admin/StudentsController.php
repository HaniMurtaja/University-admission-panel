<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Role;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class StudentsController extends Controller
{
    public function index()
    {
        Gate::authorize('show-students');

        $students = Role::where('name', 'student')->first()->users;

        return view('Admin.Students.index', [
            'students' => $students
        ]);
    }

    public function show(User $student)
    {
        Gate::authorize('show-single-student');

        return view('Admin.Students.show', [
            'student' => $student
        ]);
    }

    public function exportUserPDF(User $student)
    {
        Gate::authorize('download-student-pdf');

        $pdf = PDF::loadView('Admin.Students.studentPDF', [
            'student' => $student,
            'courses' => $student->courses,
            'images' => $student->images
        ]);

        return $pdf->download('student.pdf');
    }
}
