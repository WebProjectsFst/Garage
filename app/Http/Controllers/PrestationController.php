<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Prestation;

class PrestationController extends Controller
{
    public function getPrestations(Request $request) {
        $id=$request->input('id');
        if($id != null){
            return (string) Prestation::where('id', '=', $id)->get();
        }else {
            return (string) Prestation::all();
        }
    }
}
