<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    public function getWorkers(Request $request) {
        $nss=$request->input('nss');
        if($nss != null) {
            return (string) Employee::where('nss', 'like', $nss.'%')->where('type', '=', 2)->get();
        }else {
            return (string) Employee::where('type', '=', 2)->get();
        }
    }

    public function getEmployeeByNSS($NSS) {
        return Employee::where('nss', '=', $NSS)->get()->first();
    }

    public function setWorkerPrestation($nss, $value) {
        Employee::where('nss', '=', $nss)->update(['id_prestation_employee' => $value]);
        return ('OK');
    }
}
