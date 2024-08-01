<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\NewOrder;
use App\Models\Lead;

class LeadController extends Controller
{
    



        // memorizzando il nuovo contatto nel nostro db
        public function store(Request $request) {

            // validazione
            // ricordiamoci di importare la Facade
            $validator = Validator::make($request->all(), [
               /* 'name' => 'required',
                'address' => 'required|email',
                'message' => 'required'*/
            ], [
               /* 'name.required' => "Devi inserire il tuo nome",
                'address.required' => "Devi inserire la tua email",
                'address.email' => "Devi inserire una mail corretta",
                'message.required' => "Devi inserire un messaggio",*/
            ]);
    
            
            // comportamento in caso la validazione non sia di successo
            if($validator->fails()) {
                // restituiamo un oggetto json con il messaggio di errore
                return response()->json([
                    'success' => false,
                    'errors' => $validator->errors()
                ]);
                
            }
    
    
            // salvataggio nel db
            $newLead = new Lead();
            $newLead->fill($request->all());
            $newLead->save();
    
    
        
             // invio della mail
            //senza quetso pezzo riusciamo cmq a scrivere tutto da vue, mandare e ricevere tutto
           //nel database, però con questo abbiamo la notifica che ci è arrivata una mail.
            Mail::to('omamalan@gmail.com')->send(new NewOrder($newLead));
    
    
    
            // risposta al client
            // restituisce un json con success true
            return response()->json([
                'success' => true,
                'message' => 'Richiesta di contatto inviata correttamente',
                'request' => $request->all()
            ]);
        }






}
