<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \App\User_Relation;

class ProfielController extends Controller
{
    public function profiel(){
        $vrtekst = DB::table('vraagtekens')->where('naam', 'profiel')->value('vrtekst');

        return view('profiel')
            ->with('user', Auth::user())
            ->with('vrtekst', $vrtekst);
    }
    
    public function store(Request $request){
        $this->validate(request(),[
            //put fields to be validated here
            ]);         
    }

    public function update(Request $request) {
        $validatedData = $request->validate([
            'gebr_naam' => 'required',
            'voornaam' => 'required',       
            'achternaam' => 'required',
            'email' => 'required|email',
            'initialen' => 'nullable',
            'tussenv' => 'nullable',
            'straatnaam' => 'nullable',
            'huisnr' => 'nullable',
            'postcode' => 'nullable',            
            'woonplaats' => 'nullable',
            'telefoon' => 'nullable',
            'mobiel' => 'nullable',
        ]);

        Auth::user()->update($validatedData);

        return redirect()->route('profiel');
    }


    
}


