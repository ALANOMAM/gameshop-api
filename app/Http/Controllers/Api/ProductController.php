<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() {
    
        $products = Product::all(); 
       

       // restituiamo un oggetto php che verrà convertito in JSON
       // i dati utili dell'api sono dentro la proprietà "results"
       return response()->json([
           "success" => true,
           "results" => $products
       ]);

   }  
}
