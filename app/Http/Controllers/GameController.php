<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Http\Requests\StoreGameRequest;
use App\Http\Requests\UpdateGameRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class GameController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $games = Game::all();

        return view('admin.games.index', compact('games'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('admin.games.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGameRequest $request)
    {  
        //per vedere l'oggetto creato dal form
        dump($request);

        $newGame = new Game();

       /*This line assumes you have a "$request" object available, which typically comes from a form submission or API request 
       in a Laravel application. The "validated()" method on the request performs form validation based on the validation 
       defined for the game model.This ensures that the data being entered for the new game meets the requirements
       (e.g., name is not empty, price is a number within a certain range).The validated() method throws 
       an exception if the validation fails. So, if there are any validation errors in the form data, 
       your code will stop executing at this point, and you'll typically be redirected back to the form with error messages displayed to the user. */
        $validated = $request->validated();


        /*Assuming the validation passes, this line takes the validated data from the $validated variable and "fills" the newly 
        created $newGame object with that data.The fill method is a convenient way to mass assign attributes to a model instance.
       In simpler terms, it maps the validated form data (e.g., game name, description, price) to the corresponding properties (columns) in the Game model.
       This effectively populates the empty record you created earlier with the actual game information from the user's input. */
        $newGame->fill($validated);

        //quello che mi collega l'id dell'utente/admin alla tabella dei giochi 
        //visto che lo "user_id" è una foreign key nella tabella dei giochi
        $newGame->user_id = Auth::id();

         //image upload
        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('images', $request->image);
            $newGame->image = $path;
        }

        //'visible' checkbox
        /* $newGame->visible = $request->has('visible') ? 1 : 0;
         $newGame->special_category = $request->has('special_category') ? 1 : 0;*/

         $newGame->save();

        // return redirect()->route("admin.games.index")->with('success', 'Game succesfully created');
    }


    /**
     * Display the specified resource.
     */
    public function show(Game $game)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Game $game)

    {
        
        //passo l'ogetto del gioco alla vita di edit
        return view('admin.games.edit', compact('game'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGameRequest $request, Game $game)
    {
        //vedere come è acambiato l'aggetto quando modifico
         //dump($request);

        $data = $request->all();

        //'visible' checkbox (sarà '0' se unchecked, e '1' se checked)
        //$data['visible'] = $request->has('visible') ? 1 : 0;

        if ($request->hasFile('image')) {
            $path = Storage::disk('public')->put('images', $request->image);
            $game->image = $path;
        };

        //Aggiorna i giochi
        $game->update($data);

        $game->save();

        return redirect()->route('admin.games.index', $game);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Game $game)
    {
        $game->delete();

        return redirect()->route('admin.games.index');
    }
}
