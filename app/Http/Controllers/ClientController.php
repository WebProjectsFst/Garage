<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\MessageBag;
use Illuminate\Support\Facades\Redirect;

class ClientController extends Controller
{
    public function getClients(Request $request){
        $cin=$request->input('existing_cin');
        $id=$request->input('id');
        if($cin != null) {
            return (string) Client::where('cin', 'like', $cin.'%')->get();
        }else if($id != null) {
            return (string) Client::where('id', '=', $id)->get();
        }else {
            $table["data"]=Client::all();
            return $table;
        }
    }

    function create(Request $request){
        $client=new Client;
        $client->cin=$request->input('existing_cin');
        $client->nom=$request->input('lastName');
        $client->prenom=$request->input('name');
        $client->tel=$request->input('telephone');
        $client->email=$request->input('email_address');
        $client->addresse=$request->input('address');
        $client->matricule_voiture=$request->input('registration-part1').'TN'.$request->input('registration-part2');
        $client->modele_voiture=$request->input('model');
        $client->marque_voiture=$request->input('brand');
        $client->save();
        if($request->input('returnType') == "true"){
            return $client;
        }else{
            $errors = new MessageBag(['page' => ['2'], "show_success_modal" => ['show']]);
            return Redirect::back()->withErrors($errors);
        }
    }

    function update(Request $request) {
        $newClientData=array("nom" => $request->input('lastName'),
                            "prenom" => $request->input('name'),
                            "tel" => $request->input('telephone'),
                            "email" => $request->input('email_address'),
                            "addresse" => $request->input('address'),
                            "matricule_voiture" => $request->input('registration'),
                            "modele_voiture" => $request->input('model'),
                            "marque_voiture" => $request->input('brand'));
        $result=Client::where('cin', '=', $request->input('existing_cin'))->update($newClientData);
        $errors = new MessageBag(['page' => ['2'], "show_success_modal" => ['show']]);
        return Redirect::back()->withErrors($errors);
    }

    function delete(Request $request) {
        $result=Client::where('cin', '=', $request->input('existing_cin'))->delete();
        $errors = new MessageBag(['page' => ['2']]);
        return Redirect::back()->withErrors($errors);
    }

    /*public function postClient(ClientRequest $request){
      $client=new Client;
      $client->nom=$request->input('nom');
      $client->prenom='LOLO';
      $client->tel='12223';
      $client->addresse='sdjlhfs';
      $client->matricule_voiture='12333';
      $client->modele_voiture="kkk";
      $client->marque_voiture="kjhlsdf";
      $client->email=$request->input('email');
      $client->save();
      return view('email_ok');
    }*/
}
