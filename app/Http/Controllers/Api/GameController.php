<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function index() {
    
         $games = Game::all(); 
        

        // restituiamo un oggetto php che verrà convertito in JSON
        // i dati utili dell'api sono dentro la proprietà "results"
        return response()->json([
            "success" => true,
            "results" => $games
        ]);

    }
}
