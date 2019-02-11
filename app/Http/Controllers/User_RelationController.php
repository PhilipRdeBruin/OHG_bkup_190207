<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\User_Relation;
use App\User;

class User_RelationController extends Controller
{
    public function vrienden()
    {
        $vrienden = \App\User::All();
        return view('vriendtoevoegen', ['users' => $vrienden]);
    }
                               
    public function vriendtoevoegen(Request $request)
    {
        //get user id from post
        $vriend = $request->input('vriend');
        $gebruiker = Auth::user();

        $gebruiker->voegVriendToe($vriend);

        return \Redirect::to('profiel');
    }
    
    public function vriendToevoegenMail($gebruiker_id, $vriend_id) {
        $gebruiker = User::findOrFail($gebruiker_id);
        $vriend = User::findOrFail($vriend_id);

	$gebr_vriend = User_Relation::where('gebruiker', $gebruiker_id)->where('vriend', $vriend_id)->first();
	$vriend_gebr = User_Relation::where('vriend', $gebruiker_id)->where('gebruiker', $vriend_id)->first();

	if (!$gebr_vriend && !$vriend_gebr) {
        	$gebruiker->voegVriendToe($vriend);
	}
        
        return redirect()->route('vriendkiezen');
    }
    
      protected function validator(array $data)
    {
        return Validator::make($data, [
            'vriend' => ['required','unique:users_relations'],
        ]);
      }
}
