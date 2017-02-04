<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;
use Session;

class HomeController extends Controller
{
    public function index()
    {
      if(Session::has('employee')) {
        return redirect("/dashboard");
      }else {
        return view('home');
      }
    }

    public function login()
    {
      if(Employee::where('email', '=', Input::get('email'))->exists()){
        $employee = Employee::where(['email' => Input::get('email'), 'password' => Input::get('password')])->first();
        if($employee != null) {
          Session::put('employee', $employee);
          Session::put('login_time', time());
            return redirect('dashboard');
        }else {
          $errors = new MessageBag(['password' => ['Email and/or password invalid.']]);
          return Redirect::back()->withErrors($errors);
        }
      }
      else {
        $errors = new MessageBag(['email' => ['This email address was not found in our records.']]);
        return Redirect::back()->withErrors($errors);
      }
    }
}
