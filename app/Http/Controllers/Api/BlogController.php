<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index() {
    
        $blogs = Blog::all(); 
       

       // restituiamo un oggetto php che verrà convertito in JSON
       // i dati utili dell'api sono dentro la proprietà "results"
       return response()->json([
           "success" => true,
           "results" => $blogs
       ]);

   }
    
}
