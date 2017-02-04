<?php

namespace App\Http\Controllers;

use App\PieceRechange;
use Illuminate\Http\Request;

class PieceRechangeController extends Controller
{
    public function getPiecesRechange(Request $request){
        $ref=$request->input('ref');
        if($ref != null) {
            return (string) PieceRechange::where('reference', 'like', $ref.'%')->get();
        }else {
            return (string) PieceRechange::all();
        }
    }
}
