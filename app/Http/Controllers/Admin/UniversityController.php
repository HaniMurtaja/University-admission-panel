<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\University;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class UniversityController extends Controller
{

    public function index()
    {
        Gate::authorize('show-universities');

        $universities = University::all();
        return view('Admin.University.index', [
            'universities' => $universities
        ]);
    }

    public function create()
    {
        Gate::authorize('add-university');

        return view('Admin.University.create');
    }

    public function store(Request $request)
    {
        Gate::authorize('add-university');

        $request->validate([
            'name' => 'required|string|unique:universities',
            'institution_type' => 'required|string',
            'founding_year' => 'required|numeric',
            'website' => 'nullable|string',
            'images' => 'required|image',
            'about' => 'required'
        ], [
            'images.required' => 'University Logo is Required',
            'images.image' => 'University Logo must be an Image'
        ]);

        $university = University::create([
            'name' => $request->name,
            'institution_type' => $request->institution_type,
            'founding_year' => $request->founding_year,
            'website' => $request->website,
            'about' => $request->about
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $file_name = $university->name . '.' . $file->getClientOriginalExtension();
            $university->image = $file_name;
            if ($university->save()) {
                self::generate_url($file, $file_name);
            }
        }

        return back()->with([
            'success' => 'University Added Successfully !'
        ]);
    }


    public function show(University $university)
    {
        abort(404);
    }

    public function edit(University $university)
    {
        Gate::authorize('edit-university');

        return view('Admin.University.edit', [
            'university' => $university
        ]);
    }

    public function update(Request $request, University $university)
    {
        Gate::authorize('edit-university');

        $request->validate([
            'name' => ['required', 'string', Rule::unique('universities')->ignoreModel($university)],
            'institution_type' => 'required|string',
            'founding_year' => 'required|numeric',
            'website' => 'nullable|string',
            'images' => 'nullable|image',
            'about' => 'required'
        ], [
            'images.image' => 'University Logo must be an Image'
        ]);

        $university->update([
            'name' => $request->name,
            'institution_type' => $request->institution_type,
            'founding_year' => $request->founding_year,
            'website' => $request->website,
            'about' => $request->about
        ]);

        if ($request->hasFile('images')) {
            $file = $request->file('images');
            $file_name = $university->name . '.' . $file->getClientOriginalExtension();
            $university->image = $file_name;
            if ($university->save()) {
                self::generate_url($file, $file_name);
            }
        }

        return redirect(route('admin.universities.index'))->with([
            'success' => "$university->name University updated Successfully !",
        ]);
    }


    public function destroy(University $university)
    {
        Gate::authorize('delete-university');

        $university->delete();

        return back()->with([
            'success' => 'University Deleted Successfully !'
        ]);
    }


    private static function generate_url($file, $file_name)
    {
        $path = storage_path('app/public/images/universities');
        $file->move($path, $file_name);
    }
}
