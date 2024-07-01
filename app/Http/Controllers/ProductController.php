<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() 
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
       

   //per vedere l'oggetto creato dal form
   //dump($request);

   $newProduct = new Product();
   
    //importo le validazioni 
    $validated = $request->validated();
   
    //importo le fillables facendo passare tutto dalle validazioni 
   $newProduct->fill($validated);

   //QUESTA RIG VA MESSA DOPO AVERE STABILITO LA RELAZIONE TRA LE DUE TABELLE NELLA CARTELLA "MODEL"
   $newProduct->user_id = Auth::id();


    $newProduct->save();

    return redirect()->route("admin.products.index");

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
         //vedere come è acambiato l'aggetto quando modifico
         //dump($request);
         
         //salvo le nuove info dentro la variabile "$data"
         $data = $request->all();

        //pezzi aggiuntivi qui


         //Aggiorna i giochi
         $product->update($data);
 
         //salvo le modifiche
         $product->save();
 
         return redirect()->route('admin.products.index', $product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('admin.products.index');
    }
}
