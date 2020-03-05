<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Permission;
use App\Models\Role;
use DB;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class RoleController extends Controller
{

    public function __construct()
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $roles = Role::paginate(10);
        return view('settings.roles.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $permissions = Permission::all();
        return view('settings.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|alpha_dash|max:100',
            'display_name' => 'required|max:100',
            'description' => 'required|max:100',
        ], [
            'description.required' => 'Role description field is required.',
        ]);

        $role = Role::create($request->except(['permission', '_token']));

        foreach ($request->permission as $key => $value) {
            $role->permissions()->attach($value);
        }

        if (!empty($role->id)) {
            $notification = array(
                'message' => 'Role add successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return Response
     */
    public function edit($id)
    {
        $role = Role::find($id);
        $permissions = Permission::all();
        $role_permissions = $role->permissions()->pluck('id', 'id')->toArray();
        return view('settings.roles.edit', compact(['role', 'role_permissions', 'permissions']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        $role = Role::find($id);

        request()->validate([
            'name' => 'required|alpha_dash|max:100',
            'display_name' => 'required|max:100',
            'description' => 'required|max:100',
        ], [
            'description.required' => 'Role description field is required.',
        ]);

        $role->name = $request->name;
        $role->display_name = $request->display_name;
        $role->description = $request->description;
        $affected_row = $role->save();

        DB::table('permission_role')->where('role_id', $id)->delete();

        foreach ($request->permission as $key => $value) {
            $role->permissions()->attach($value);
        }

        if (!empty($affected_row)) {
            $notification = array(
                'message' => 'Role update successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return Response
     */
    public function destroy($id)
    {
        $role = Role::findOrFail($id);

        // DB::table("roles")->where('id', $id)->delete();

        if ($role->delete()) {
            $notification = array(
                'message' => 'Role delete successfully.',
                'alert-type' => 'success'
            );
        } else {
            $notification = array(
                'message' => 'Operation failed!',
                'alert-type' => 'error'
            );
        }
        return redirect()->back()->with($notification);
    }
}
