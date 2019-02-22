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
            $gebruiker = Auth::user();

            if ($gebruiker != null) {
                return view('spelkeuze')->with('vrtekst',$vrtekst);
            } else {
                return \Redirect::to('index');
            }
        }

        public function spel($id = 0){
            $vrtekst = DB::table('vraagtekens')->where('naam', 'spel')->value('vrtekst');
            $spelletje = \App\Spelletje::find($id);
            $gebruiker = Auth::user();

            if ($gebruiker != null && $id > 0) {
                return view('spel',['gebruiker' => $gebruiker, 'spelletje' => $spelletje, 'vrtekst' => $vrtekst ]);            
            } else {
                return \Redirect::to('index');
            }            
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
