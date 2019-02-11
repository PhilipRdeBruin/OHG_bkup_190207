<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Mail\PendingMail;
use Illuminate\Support\Facades\Auth;
use App\User_Relation;
use App\Actievespelletje;
use App\User;
use App\Spelletje;
use App\ActievespelletjeUser;
use App\Mail\SpelAccepteren;


class ActievespelController extends Controller
{
   public function actiefspeltoevoegen (Request $request)  {
//       dd($request);
        $spelletje = Spelletje::where('id', $request->input('spel'))->first();
        $actiefspel = new Actievespelletje(); 
        $actiefspel->spel_id = $spelletje->id;
        $actiefspel->host = Auth::id();
        $actiefspel->aanvangstijdstip = $request->input('aanvangstijdstip');
        $actiefspel->gamestate = 0;
        $actiefspel->save();
       
        $spelerIds = $request->input('spelers');
        $spelers = User::whereIn('id', $spelerIds)->get();

        foreach ($spelers as $key => $speler) {
            $rol = $request->input('rol' . ($key + 1));
            $speler->actieveSpelletjes()->attach($actiefspel->id, ['rol' => $rol]);
        }
       
        foreach($actiefspel->users as $actieveSpeler) {
            Mail::to($actieveSpeler->email)->send(new SpelAccepteren($actiefspel, $actieveSpeler, $actieveSpeler->pivot));
        }
       
        return \Redirect::to('keuze');
   }
   
    
    public function actiefspelaccepteren ($id) {
        $spelbevestigen = ActievespelletjeUser::findOrFail($id);
        $spelbevestigen->bevestigd = true;
        $spelbevestigen->save(); 
    
        return \Redirect::to('keuze');
    }         
   
    
}
    
    
 
