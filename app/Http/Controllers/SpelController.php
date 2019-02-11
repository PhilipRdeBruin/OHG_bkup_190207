<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use Illuminate\Support\Facades\Auth;
use \App\spelletje;

class SpelController extends Controller
{
    public function spelkeuze()
        {
            $vrtekst = DB::table('vraagtekens')->where('naam', 'spelkeuze')->value('vrtekst');
       
            $spelletjes = \App\Spelletje::All();

            return view('spelkeuze')->with('vrtekst',$vrtekst);
        }

        public function spel($id){
            $vrtekst = DB::table('vraagtekens')->where('naam', 'spel')->value('vrtekst');

            $spelletje = \App\Spelletje::find($id);

            $gebruiker = Auth::user();

            return view('spel',['gebruiker' => $gebruiker, 'spelletje' => $spelletje, 'vrtekst' => $vrtekst ]);            
            
        }

        public function spelSpelen($spelId, $uitgenodigdeId){
            $gebruiker = Auth::user();
            $uitgenodigde = User::findOrFail($uitgenodigdeId);
            $spel = Spelletje::findOrFail($spelId);

            return view('spelSpelen',[
                'gebruiker' => $gebruiker, 
                'uitgenodigde' => $uitgenodigde,  
                'spel' => $spel
            ]);
        }

}
