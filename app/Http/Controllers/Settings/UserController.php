<?php

namespace App\Http\Controllers\Settings;

use App\Http\Controllers\Controller;
use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('permission:manage-users',   ['only' => ['index']]);
        $this->middleware('permission:create-user',   ['only' => ['create', 'store']]);
        $this->middleware('permission:read-user',   ['only' => ['show']]);
        $this->middleware('permission:update-user',   ['only' => ['edit', 'update']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /*$user = User::findOrFail(1);
        $user->roles()->attach(1);
        $user->roles()->attach([2,3]);
        $user->roles()->sync([1]);
        dd($user->roles);*/
        $users = User::with('roles')->where('id', '!=', Auth::user()->id)->orderBy('id', 'desc')->paginate(10);
        return view('settings.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('settings.users.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'string', 'email', 'max:100', 'unique:users'],
            'role_id' => ['required'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ],[
            'role_id.required' => 'The role name field is required',
        ]);

        $user = User::create([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'password' => Hash::make($request->input('password'))
        ]);

        $user->roles()->attach($request->input('role_id'));

        if (!empty($user->id)) {
            $notification = array(
                'message' => 'User add successfully.',
                'alert-type' => 'success'
            );
            return redirect()->route('admin.settings.users.show', $user->id)->with($notification);
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::findOrFail($id);
        return view('settings.users.view', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $roles = Role::all();
        $user = User::findOrFail($id);
        return view('settings.users.edit', compact('user', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email,' . $user->id,
            'role_id' => 'required',
            'password' => 'sometimes|min:6|max:100',
        ],[
            'role_id.required' => 'The role name field is required'
        ]);

        $user->name = $request->get('name');
        $user->email = $request->get('email');
        $user->password = Hash::make($request->get('password'));
        $affected_row = $user->save();

        $user->roles()->sync($request->get('role_id'));

        if (!empty($affected_row)) {
            $notification = array(
                'message' => 'User update successfully.',
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
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        //
    }
}
