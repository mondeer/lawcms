<?php

namespace fms\Http\Controllers\Auth;

use Illuminate\Http\Request;
use fms\Http\Controllers\Controller;
use Sentinel;

class LoginController extends Controller
{
  public function login() {
    return view('auth.login');
  }

  public function postLogin(Request $request) {

    $user = Sentinel::forceAuthenticate($request->all());

    if(Sentinel::getUser()->roles()->first()->slug == 'admin'){
      return redirect('/sys/admin');
    } elseif (Sentinel::getUser()->roles()->first()->slug == 'managing') {
      return redirect('/managing/home');
    } elseif (Sentinel::getUser()->roles()->first()->slug == 'advocate_incharge') {
      return redirect('/advicate/home');
    } elseif (Sentinel::getUser()->roles()->first()->slug == 'associate') {
      return redirect('/associate/home');
    } elseif (Sentinel::getUser()->roles()->first()->slug == 'pupil') {
      return redirect('/pupil/home');
    } elseif (Sentinel::getUser()->roles()->first()->slug == 'clerk') {
      return redirect('/clerk/home');
    } else {
      return redirect('/');
    }

  }

  public function logout() {
    Sentinel::logout();

    return redirect('/');
  }
}
