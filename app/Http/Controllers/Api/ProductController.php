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

       //per la paginazione 
       public function show($id) {

        // per trovare il product senza eager loading
        // $product = Post::find($id);

        $product = Product::all()->where('id', '=', $id)->first();

        // dd($product);

        return response()->json([
            "success" => true,
            "product" => $product
        ]);

    } 



}
