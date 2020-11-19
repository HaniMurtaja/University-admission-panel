<?php

namespace App\Http\Controllers\Admin;

use App\CourseType;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CourseTypeController extends Controller
{
    public function index()
    {
        Gate::authorize('show-course-types');

        $course_types = CourseType::all();

        return view('Admin.CourseTypes.index', [
            'types' => $course_types
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-course-type');

        CourseType::create(
            $request->validate([
                'name' => 'required|string'
            ])
        );

        return response()->json([
            'status' => true,
            'message' => 'Course Type Created Successfully !'
        ]);
    }

    public function update(Request $request, CourseType $courseType)
    {
        Gate::authorize('edit-course-type');

        $courseType->update(
            $request->validate([
                'name' => 'required|string'
            ])
        );

        return response()->json([
            'status' => true,
            'message' => 'Course Type Updated Successfully !'
        ]);
    }

    public function destroy(CourseType $courseType)
    {
        Gate::authorize('delete-course-type');

        $courseType->delete();

        return back()->with([
            'success' => 'Course Type Deleted Successfully !'
        ]);
    }
}
