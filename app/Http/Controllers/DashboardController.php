<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Prestation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Session;
use DB;
use Illuminate\Support\Facades\Input;
use App\Client;

class DashboardController extends Controller
{
    public function Index()
    {
        if (Session::has('employee') && Session::has('login_time'))
        {
            $employee=Session::get('employee');
            $newEmployee=(new EmployeeController())->getEmployeeByNSS($employee->NSS);
            Session::set('employee', $newEmployee);
            switch($employee->type){
                case 1:
                    return view('dashboard/receptioniste/receptioniste_dashboard');
                    break;
                case 2:
                    return view('dashboard/worker/worker_dashboard');
                    break;
                case 3:
                    return view('dashboard/accountant/accountant_dashboard');
                    break;
                case 4:
                    return view('dashboard/manager/manager_dashboard');
                    break;
            }
        }else {
            return Redirect::to('/');
        }
    }

    public function logout() {
        if(Session::has('employee') && Session::has('login_time')) {
            Session::forget('employee');
            Session::forget('login_time');
        }
        return Redirect::to('/');
    }
}
