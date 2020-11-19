<?php

namespace App\Http\Controllers\Admin;

use App\Ability;
use App\Http\Controllers\Controller;
use App\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Validation\Rule;

class RoleController extends Controller
{
    public function index()
    {
        Gate::authorize('show-roles');

        $roles = Role::all();

        return view('Admin.Roles.index', [
            'roles' => $roles
        ]);
    }

    public function create()
    {
        Gate::authorize('add-role');

        $abilities = Ability::all();

        return view("Admin.Roles.create", [
            'abilities' => $abilities
        ]);
    }

    public function store(Request $request)
    {
        Gate::authorize('add-role');

        $request->validate([
            'name' => 'required|string|unique:roles|min:3',
            'abilities' => 'nullable|array|not_in:0'
        ]);

        $role = Role::create([
            'name' => $request->name,
        ]);

        $role->abilities()->attach($request->abilities);

        return back()->with([
            'success' => 'Role Added Successfully !'
        ]);
    }


    public function edit(Role $role)
    {
        Gate::authorize('edit-role');
        if ($role->name != 'Super Admin') {
            return view('Admin.Roles.edit', [
                'role' => $role,
                'abilities' => Ability::all()
            ]);
        }else{
            abort(404);
        }
    }

    public function update(Request $request, Role $role)
    {
        Gate::authorize('edit-role');

        if ($role->name != 'Super Admin') {
            $request->validate([
                'name' => [Rule::unique('roles')->ignore($role->id), 'required', 'string', 'min:3'],
                'abilities' => 'nullable|array|not_in:0'
            ]);

            $role->update([
                'name' => $request->name
            ]);

            $role->abilities()->sync($request->abilities);

            return redirect(route('admin.roles.index'))->with([
                'success' =>'Role Updated Successfully !'
            ]);
        } else {
            abort(404);
        }
    }

    public function destroy(Role $role)
    {
        Gate::authorize('delete-role');
        if ($role->name != 'Super Admin') {
            $role->delete();

            return back()->with([
                'success' => 'Role Deleted Successfully !'
            ]);
        } else {
            abort(404);
        }
    }


}
