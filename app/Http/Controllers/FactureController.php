<?php

namespace App\Http\Controllers;

use App\Facture;
use App\FichePrestation;
use Faker\Provider\DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class FactureController extends Controller
{
    public function getPayedBills(){
        $table["data"]=Facture::where('status', '=', '1')->get();
        return $table;
    }

    public function getTodayPaidBills(){
        $date=date('Y-m-d');
        return (string) Facture::whereDate('date_payement', '=', $date)->where('status', '=', '1')->get();
    }

    public function getThisMonthPaidBills(){
        $year=date("Y");
        $month=date("m");
        return (string) Facture::whereYear('date_payement', '=', $year)->whereMonth('date_payement', '=', $month)->where('status', '=', '1')->get();
    }

    public function getThisYearPaidBills(){
        $year=date("Y");
        return (string) Facture::whereYear('date_payement', '=', $year)->where('status', '=', '1')->get();
    }

    public function getUnpaidBills(){
        $table["data"]=Facture::where('status', '=', '0')->get();
        return $table;
    }

    public function create(Request $request) {
        $facture=new Facture;
        $facture->id_fiche_prestation=$request->input('id_fiche_prestation');
        $facture->status=0;
        $facture->montant=$request->input('montant');
        $facture->save();

        FichePrestation::where('id', '=', $request->input('id_fiche_prestation'))->update(['NSS_employee' => null]);
        return Redirect::back();
    }

    public function payFacture(Request $request){
        $factureID=$request->input('id');
        Facture::where('id', '=', $factureID)->update(['date_payement' => date("Y-m-d H:i:s"), 'status' => '1']);
    }
}
