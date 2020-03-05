<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{
    /**
     * DashboardController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('profile.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:100',
            'email' => 'required|string|email|max:100|unique:users,email,' . $id,
        ]);

        $user  = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $affected_row = $user->save();

        if(!empty($affected_row)){
            return response(['success' => true, 'message' => "Profile update successfully."], 200);
        }

        return response(['errors' => true, 'message' => "Operation failed!"], 500);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function update_password(Request $request) {

        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|string|min:8|confirmed',
        ]);

        if (!(Hash::check($request->get('current_password'), Auth::user()->password))) {
            // The passwords matches
            return response(['errors' => true, 'message' => "Current password does not match!"], 500);
        }

        if (strcmp($request->get('current_password'), $request->get('new_password')) == 0) {
            //Current password and new password are same
            return response(['errors' => true, 'message' => "New Password cannot be same as your current password!"], 500);
        }

        //Change password
        $user = Auth::user();
        $user->password = bcrypt($request->get('new_password'));
        $affected_row = $user->save();

        if(!empty($affected_row)){
            return response(['success' => true, 'message' => "Password change successfully."], 200);
        }

        return response(['errors' => true, 'message' => "Operation failed!"], 500);
    }
}
