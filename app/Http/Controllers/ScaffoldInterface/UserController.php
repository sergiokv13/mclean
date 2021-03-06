<?php

namespace App\Http\Controllers\ScaffoldInterface;

use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = \App\User::all();

        return view('scaffold-interface.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0)
        {
            return view('scaffold-interface.users.create');
        }
        else
        {
            return view('no_authorization');
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $messsages = array(
        'email.required' => 'El correo electronico es obligatorio.',
        'password.required' => 'La contraseña es obligatoria.',
        );

        $rules = array(
            'email' => 'required',
            'password' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $user = new \App\User();

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        $user->assignRole("Administrator");

        return redirect('scaffold-users');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrfail($id);
        if ((\Auth::user()->Roles()->where('name','Administrator')->get()->count() > 0) || (\Auth::user() == $user))
        {
            $roles = Role::all()->pluck('name');
            $permissions = Permission::all()->pluck('name');
            $userRoles = $user->roles;
            $userPermissions = $user->permissions;

            return view('scaffold-interface.users.edit', compact('user', 'roles', 'permissions', 'userRoles', 'userPermissions'));
        }
        else
        {
            return view('no_authorization');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
         $messsages = array(
        'email.required' => 'El correo electronico es obligatorio.',
        'name.required'=>'El nombre es obligatorio.',
        'password.required' => 'La contraseña es obligatoria.',
        );

        $rules = array(
            'email' => 'required',
            'name' => 'required',
            'password' => 'required',
        );

        $this->validate($request, $rules, $messsages);

        $user = \App\User::findOrfail($request->user_id);

        $user->email = $request->email;
        $user->name = $request->name;
        $user->password = Hash::make($request->password);

        $user->save();

        return redirect('scaffold-users');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrfail($id);

        $user->delete();

        return redirect('scaffold-users');
    }

    /**
     * Assign Role to user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addRole(Request $request)
    {
        $user = \App\User::findOrfail($request->user_id);

        if ($user->Roles()->where('name',$request->role_name)->get()->count() == 0)
        {
            $user->assignRole($request->role_name);
        }
        return redirect('scaffold-users/edit/'.$request->user_id);
    }

    /**
     * Assign Permission to a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function addPermission(Request $request)
    {
        $user = \App\User::findorfail($request->user_id);
        $user->givePermissionTo($request->permission_name);

        return redirect('scaffold-users/edit/'.$request->user_id);
    }

    /**
     * revoke Permission to a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function revokePermission($permission, $user_id)
    {
        $user = \App\User::findorfail($user_id);

        $user->revokePermissionTo(str_slug($permission, ' '));

        return redirect('scaffold-users/edit/'.$user_id);
    }

    /**
     * revoke Role to a a user.
     *
     * @param \Illuminate\Http\Request
     *
     * @return \Illuminate\Http\Response
     */
    public function revokeRole($role, $user_id)
    {
        $user = \App\User::findorfail($user_id);

        $user->removeRole($role);

        return redirect('scaffold-users/edit/'.$user_id);
    }
}
