<?php

namespace App\Http\Controllers;

use App\Course;
use App\CourseType;
use App\University;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'course_types' => CourseType::all(),
            'universities' => University::all()
        ]);
    }

    public function courses()
    {
        if (request()->hasAny(['search', 'course_type', 'university'])) {

            $courses = Course::where('name', 'like', '%' . request('search') . '%')
                ->orWhere('type_id', request('course_type'))
                ->orWhere('university_id', request('university'))
                ->paginate(5);

        } else if (request()->has('type')) {

            $courses = CourseType::findOrFail(request('type'))->courses()->paginate(5);

        } else {

            $courses = Course::paginate(5);

        }

        return view('Home.courses', [
            'courses' => $courses,
            'types' => CourseType::all(),
            'universities' => University::all()
        ]);
    }

    public function showCourse(Course $course)
    {

        $sameCourses = Course::where('id', '!=', $course->id)
            ->where('type_id', $course->type_id)
            ->where('university_id', $course->university_id)
            ->take(8)
            ->get();

        return view('Home.single-course', [
            'course' => $course,
            'sameCourses' => $sameCourses
        ]);
    }

    public function universities()
    {

        $universities = University::paginate(5);

        return view('Home.universities', [
            'universities' => $universities
        ]);
    }

    public function showUniversity(University $university)
    {
        return view('Home.single-university',[
            'university' => $university,
            'courses' => $university->courses
        ]);
    }
}
