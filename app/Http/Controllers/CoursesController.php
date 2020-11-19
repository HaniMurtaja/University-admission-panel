<?php

namespace App\Http\Controllers;

use App\Course;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class CoursesController extends Controller
{
    public function index()
    {
        $courses = Cookie::get('courses');
        $courses = json_decode($courses);

        return view('courses.selected_courses', [
            'courses' => $courses
        ]);
    }

    public function save()
    {
        if (Cookie::has('courses')) {
            if (count(auth()->user()->images) > 0) {

                $courses = Cookie::get('courses');
                $courses = json_decode($courses);

                foreach ($courses as $course) {
                    auth()->user()->courses()->sync(Course::findOrFail($course->id), false);
                }

                Cookie::queue(Cookie::forget('courses'));

                return redirect('/home')->with([
                    'success' => 'Courses Proceeded Successfully !'
                ]);

            } else {

                return back()->with([
                    'error' => 'Please Upload Images First'
                ]);

            }
        } else {
            abort(403, "Cookie Expired");
        }
    }

    public function saveImages(Request $request)
    {

//        dd(auth()->user()->id);
        if ($request->hasFile('file')) {
            $image = $request->file('file');
            $file_name = time() . '.' . $image->getClientOriginalExtension();

            auth()->user()->images()->create([
                'name' => $file_name
            ]);

            self::generate_url($image, $file_name, auth()->user()->id);

        }

        return response()->json([
            'success' => 'Image Saved Successfully !'
        ]);
    }

    public function store(Course $course)
    {
        $data = null;
        $data['id'] = $course->id;
        $data['name'] = $course->name;
        $data['fees'] = $course->fees;
        $data['university'] = $course->university->name;
        if (!Cookie::has('courses')) {
            $courses = array();
            array_push($courses, $data);
            $json_array = json_encode($courses);
            Cookie::queue('courses', $json_array, 60 * 24);
        } else {
            $courses = Cookie::get('courses');
            $courses = json_decode($courses);
            array_push($courses, $data);
            $json_array = json_encode($courses);
            Cookie::queue('courses', $json_array, 60 * 24);
        }

        return redirect(route('courses'))->with([
            'success' => 'Course Added Successfully !'
        ]);
    }

    public function remove(Course $course)
    {
        $courses = Cookie::get('courses');
        $courses = json_decode($courses);


        foreach ($courses as $key => $value) {
            if ($value->id === $course->id) {
                unset($courses[$key]);
            }
        }
        $courses = array_values($courses);

        $courses = json_encode($courses);

        Cookie::queue('courses', $courses, 60 * 24);

        return back()->with([
            'success' => 'Course Removed Successfully !'
        ]);
    }

    private static function generate_url($file, $file_name, $user)
    {
        $path = storage_path("app/public/images/users/$user");
        $file->move($path, $file_name);
    }
}
