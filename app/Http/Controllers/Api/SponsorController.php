<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Sponsor;
use Illuminate\Http\Request;

class SponsorController extends Controller
{
    public function index() {
    
        $sponsors = Sponsor::all(); 
       

       // restituiamo un oggetto php che verrà convertito in JSON
       // i dati utili dell'api sono dentro la proprietà "results"
       return response()->json([
           "success" => true,
           "results" => $sponsors
       ]);

   }
}
