<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Course;
use App\CourseType;
use App\Http\Controllers\Controller;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseController extends Controller
{

    public function index()
    {
        Gate::authorize('show-courses');

        $courses = Course::all();

        return view('Admin.Courses.index', [
            'courses' => $courses
        ]);
    }

    public function create()
    {
        Gate::authorize('add-course');

        return view('Admin.Courses.create', [
            'universities' => University::all(),
            'types' => CourseType::all(),
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-course');

        $request->validate([
            'name' => 'required|string',
            'fees' => 'required|numeric',
            'duration' => 'required|numeric',
            'type_id' => 'required|numeric|not_in:0',
            'university_id' => 'required|numeric|not_in:0',
            'categories' => 'required|array',
            'description' => 'required|string'
        ], [
            'type_id.required' => 'Course Type is Required',
            'university_id.required' => 'University is Required'
        ]);

        $course = Course::create([
            'name' => $request->name,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'type_id' => $request->type_id,
            'university_id' => $request->university_id,
            'description' => $request->description
        ]);

        $course->categories()->attach($request->categories);

        return back()->with([
            'success' => 'Course Added Successfully !'
        ]);
    }


    public function edit(Course $course)
    {

        Gate::authorize('edit-course');

        return view('Admin.Courses.edit', [
            'course' => $course,
            'universities' => University::all(),
            'types' => CourseType::all(),
            'categories' => Category::all()
        ]);
    }

    public function update(Request $request, Course $course)
    {

        Gate::authorize('edit-course');

        $request->validate([
            'name' => 'required|string',
            'fees' => 'required|numeric',
            'duration' => 'required|numeric',
            'type_id' => 'required|numeric|not_in:0',
            'university_id' => 'required|numeric|not_in:0',
            'categories' => 'required|array',
            'description' => 'required|string'
        ], [
            'type_id.required' => 'Course Type is Required',
            'university_id.required' => 'University is Required'
        ]);

        $course->update([
            'name' => $request->name,
            'fees' => $request->fees,
            'duration' => $request->duration,
            'type_id' => $request->type_id,
            'university_id' => $request->university_id,
            'description' => $request->description
        ]);

        $course->categories()->sync($request->categories);

        return redirect(route('admin.courses.index'))->with([
            'success' => 'Course Updated Successfully !'
        ]);
    }

    public function destroy(Course $course)
    {
        Gate::authorize('delete-course');

        $course->delete();

        return back()->with([
            'success' => 'Course Deleted Successfully !'
        ]);
    }
}
