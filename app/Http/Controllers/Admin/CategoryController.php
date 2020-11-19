<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function index()
    {
        Gate::authorize('show-course-categories');

        return view('Admin.Categories.index', [
            'categories' => Category::all()
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-course-category');

        Category::create(
            $request->validate([
                'name' => 'required|string'
            ])
        );

        return response()->json([
            'status' => true,
            'message' => 'Category Created Successfully !'
        ]);
    }

    public function update(Request $request, Category $category)
    {
        Gate::authorize('edit-course-category');

        $category->update(
            $request->validate([
                'name' => 'required|string'
            ])
        );

        return response()->json([
            'status' => true,
            'message' => 'Category Updated Successfully !'
        ]);
    }

    public function destroy(Category $category)
    {
        Gate::authorize('delete-course-category');

        $category->delete();

        return back()->with([
            'success' => 'Category Deleted Successfully !'
        ]);
    }
}
