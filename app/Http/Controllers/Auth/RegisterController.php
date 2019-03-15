<?php

namespace fms\Http\Controllers\Auth;

use Illuminate\Http\Request;
use fms\Http\Controllers\Controller;
use Sentinel;

class RegisterController extends Controller
{

  public function create() {
    return view('auth.register');
  }

  public function register(Request $request) {
    $user = Sentinel::registerAndActivate([
      'email'=>$request->input('email'),
      'password'=>$request->input('password'),
      'first_name'=>$request->input('first_name'),
      'last_name'=>$request->input('last_name'),
    ]);

    $admin = Sentinel::findRoleBySlug('admin');
    $admin->users()->attach($user);

    return redirect('/dashboard');

  }

  public function new_user()
  {
    return view('system.users.new');
  }

  public function registerNew(Request $request)
  {
    $user = Sentinel::registerAndActivate([
      'email'=>$request->input('email'),
      'password'=>$request->input('password'),
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

    return redirect('/dashboard');

  }
}
