<?php

namespace App\Http\Controllers;

use App\Client;
use App\FichePrestation;
use App\PieceRechange;
use App\Prestation;
use Illuminate\Http\Request;

class AccountantController extends Controller
{
    public function getPrestations(Request $request){
        $fichesPrestation = FichePrestation::where('NSS_employee', '=', '33333333')->get();
        $rs="";
        foreach ($fichesPrestation as &$fiche){
            $client=Client::where('id', '=', $fiche->id_client)->get()->first();
            $prestation=Prestation::where('id', '=', $fiche->id_prestation)->get()->first();
            $fiche->clientLastName=$client->nom;
            $fiche->clientName=$client->prenom;
            $fiche->prestationLibelle=$prestation->libelle;
        }
        $table["data"]=$fichesPrestation;
        return $table;
    }

    public function getPrestationByID(Request $request){
        $id=$request->input('id');
        $fichesPrestation = FichePrestation::where('id', '=', $id)->get();
        foreach ($fichesPrestation as &$fiche){
            $client=Client::where('id', '=', $fiche->id_client)->get()->first();
            $prestation=Prestation::where('id', '=', $fiche->id_prestation)->get()->first();

            $piece=PieceRechange::where('reference', '=', $fiche->reference_piece)->get()->first();
            $fiche->clientLastName=$client->nom;
            $fiche->clientName=$client->prenom;
            $fiche->cin=$client->cin;
            $fiche->tel=$client->tel;
            $fiche->address=$client->addresse;
            $fiche->email=$client->email;
            $fiche->prestationLibelle=$prestation->libelle;
            $fiche->prestationPrice=$prestation->prix;

            if($piece != null){
                $fiche->referencePiece=$piece->reference;
                $fiche->marquePiece=$piece->marque;
                $fiche->typePiece=$piece->type;
                $fiche->libellePiece=$piece->libelle;
                $fiche->pricePiece=$piece->prix;
            }else{
                $fiche->referencePiece=null;
                $fiche->marquePiece=null;
                $fiche->typePiece=null;
                $fiche->libellePiece=null;
                $fiche->pricePiece=null;
            }
        }
        return $fichesPrestation;
    }
}
