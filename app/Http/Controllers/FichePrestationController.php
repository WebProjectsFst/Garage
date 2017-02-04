<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\FichePrestation;
use Illuminate\Support\MessageBag;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\EmployeeController;

class FichePrestationController extends Controller
{
    public function create (Request $request)
    {
        $id=$request->input("client_id");
        if(!$id) {
            $client=(new ClientController())->create($request, true);
            $id=$client->id;
        }
        $fichePrestation = new FichePrestation();
        $fichePrestation->id_client = $id;
        $fichePrestation->id_prestation = $request->input('prestation');
        $fichePrestation->NSS_employee = $request->input('workers');
        $fichePrestation->save();

        $errors = new MessageBag(['page' => ['1'], "show_success_modal" => ['show']]);
        return Redirect::back()->withErrors($errors);
    }

    public function getFichePrestation (Request $request) {
        $id = $request->input("ficheprestation_id");
        if($id != null){
            return (string) FichePrestation::where('id', '=', $id)->get();
        }else {
            return (string) FichePrestation::all();
        }
    }

    public function getFichePrestationByNSS (Request $request) {
        $nss = $request->input('nss_employee');
        return (string)FichePrestation::where('NSS_employee', '=', $nss)->get();
    }

    public function updateFichePrestation (Request $request) {
        $id = $request->input("ficheprestationId");
        $refPiece="";
        if($request->input("pieces") == ""){
            $refPiece=null;
        }else {
            $refPiece=$request->input("pieces");
        }
        FichePrestation::where('id', '=', $id)->update(['diagnostiques' => $request->input("diagnostic"), 'solution' => $request->input("solution"), 'type_reparation' => $request->input("reparation"), 'reference_piece' => $refPiece, "NSS_employee" => "33333333"]);
        return Redirect::back();
    }
}
