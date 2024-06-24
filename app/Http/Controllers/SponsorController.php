<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use App\Http\Requests\StoreSponsorRequest;
use App\Http\Requests\UpdateSponsorRequest;
use Illuminate\Support\Facades\Auth;

class SponsorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $sponsors = Sponsor::all();
        return view('admin.sponsors.index', compact('sponsors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.sponsors.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSponsorRequest $request)
    {

         //per vedere l'oggetto creato dal form
        //dump($request);

        $newSponsor = new Sponsor();
        $validated = $request->validated();
        $newSponsor->fill($validated);


        $newSponsor->user_id = Auth::id();

         $newSponsor->save();

         return redirect()->route("admin.sponsors.index");//->with('success', 'Game succesfully created')
    }

    /**
     * Display the specified resource.
     */
    public function show(Sponsor $sponsor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Sponsor $sponsor)
    {
        //
        return view('admin.sponsors.edit', compact('sponsor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSponsorRequest $request, Sponsor $sponsor)
    {
          //vedere come è acambiato l'aggetto quando modifico
         //dump($request);
         
         //salvo le nuove info dentro la variabile "$data"
         $data = $request->all();



         
         //Aggiorna gli sponsors
         $sponsor->update($data);
 
         //salvo le modifiche
         $sponsor->save();
 
         return redirect()->route('admin.sponsors.index', $sponsor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Sponsor $sponsor)
    {
        //
    }
}
