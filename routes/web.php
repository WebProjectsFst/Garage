<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/
use Illuminate\Support\Facades\Redirect;

//GET
Route::get('/', 'HomeController@index');
Route::get('dashboard', 'DashBoardController@index');
Route::get('logout', function (){
    return Redirect::to('/');
});
Route::get('createFichePrestation', function(){
    return view('dashboard.receptioniste.CreateFichePrestation');
});
Route::get('listeClient', function(){
    return view('dashboard.receptioniste.ListeClient');
});
Route::get('workOnFichePrestation', function(){
    return view('dashboard.worker.workOnFichePrestation');
});
Route::get('listePrestationEnAttente', function (){
    return view('dashboard.accountant.listePrestationEnAttente');
});
Route::get('listeFacturePayee', function (){
    return view('dashboard.accountant.listeFacturePayee');
});
Route::get('listeFactureNonPayee', function (){
    return view('dashboard.accountant.listeFactureNonPayee');
});

Route::post('factureController/annual', 'FactureController@getThisYearPaidBills');
Route::post('factureController/monthly', 'FactureController@getThisMonthPaidBills');
Route::post('factureController/daily', 'FactureController@getTodayPaidBills');
Route::post('factureController/create', 'FactureController@create');
Route::post('factureController/payedBills', 'FactureController@getPayedBills');
Route::post('factureController/unpayedBills', 'FactureController@getUnpaidBills');
Route::post('factureController/payBills', 'FactureController@payFacture');

//POST
Route::post('/', 'HomeController@login');
Route::post('logout', 'DashBoardController@logout');
Route::post('clients', 'ClientController@getClients');
Route::post('addClient', 'ClientController@create');
Route::post('updateClient', 'ClientController@update');
Route::post('deleteClient', 'ClientController@delete');
Route::post('prestations', 'PrestationController@getPrestations');
Route::post('fichePrestation', 'FichePrestationController@getFichePrestation');
Route::post('fichePrestationByNSS', 'FichePrestationController@getFichePrestationByNSS');
Route::post('workers', 'EmployeeController@getWorkers');
Route::post('dashboard/create', 'FichePrestationController@create');
Route::post('pieces', 'PieceRechangeController@getPiecesRechange');
Route::post('updatePrestation', 'FichePrestationController@updateFichePrestation');
Route::post("getListPrestations", 'AccountantController@getPrestations');
Route::post('getFichePrestationDetailByID', 'AccountantController@getPrestationByID');



