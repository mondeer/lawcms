<?php

namespace fms\Http\Controllers\User;

use Sentinel;
use Illuminate\Http\Request;
use fms\Http\Controllers\Controller;
use fms\Profile;

class newUserCtrl extends Controller
{
    public function newUser()
    {
        return view('system.users.new');
    }
    public function registerNew(Request $request)
    {
        $employee = new Profile();

        $employee->first_name = $request->input('first_name');
        $employee->last_name = $request->input('last_name');
        $employee->p_no = $request->input('p_no');
        $employee->email = $request->input('email');
        $employee->designation = $request->input('designation');
        $employee->access_level = $request->input('access_level');
        $employee->phone_no = $request->input('phone_no');
        $employee->nat_id = $request->input('nat_id');
        $employee->save();

        $user = Sentinel::registerAndActivate([
            'email'=>$request->input('email'),
            'password'=>$request->input('nat_id'),
            'first_name'=>$request->input('first_name'),
            'last_name'=>$request->input('last_name'),
        ]);

        $admin = Sentinel::findRoleBySlug('admin');
        $managing = Sentinel::findRoleBySlug('managing');
        $advocate_incharge = Sentinel::findRoleBySlug('advocate_incharge');
        $associate = Sentinel::findRoleBySlug('associate');
        $pupil = Sentinel::findRoleBySlug('pupil');
        $clerk = Sentinel::findRoleBySlug('clerk');

        $role = $request->input('role');

        if($role =='admin'){
            $admin->users()->attach($user);
        }
        elseif($request->input('role')=='managing'){
            $managing->users()->attach($user);
        }
        elseif($request->input('role')=='advocate_incharge'){
            $advocate_incharge->users()->attach($user);
        }elseif($request->input('role')=='associate') {
            $associate->users()->attach($user);
        }elseif($request->input('role')=='pupil') {
            $pupil->users()->attach($user);
        }elseif($request->input('role')=='clerk') {
            $clerk->users()->attach($user);
        }

        return redirect('/system/view/users');

    }

    public function viewUsers()
    {
        $profiles = Profile::all();

        return view('system.users.view', compact('profiles'));

    }

    public function deleteUser($id)
    {
        $user = Profile::findOrFail($id);

        $user->delete();

        return redirect()->back();
    }
}
