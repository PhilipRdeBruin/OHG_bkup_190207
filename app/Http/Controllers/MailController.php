<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\Vriendtoevoegen;
use App\Mail\NieuwSpeler;
use App\Mail\SpelAccepteren;
use Illuminate\Support\Facades\Auth;
use App\User;
use Illuminate\Mail\PendingMail;

class MailController extends Controller
    
{
   public function mailvriendtoevoegen(Request $request) {
       $vriend_id = $request->input('vriend');
       $gebruiker_id = Auth::user()->id;
       $gebr_naam = Auth::user()->gebr_naam;
       $vriend_naam = User::findOrFail($vriend_id)->gebr_naam;
       $vriend_email = User::findOrFail($vriend_id)->email;
       Mail::to($vriend_email)->send(new VriendToevoegen($gebruiker_id, $vriend_id, $gebr_naam, $vriend_naam));
       
       return redirect('/profiel');
   }


    public function nieuwspelertoevoegen(Request $request) {
        $nieuwspeler = $request->input('email');
        $nieuwspeler_naam = $request->input('naam');
        $speler_uitnodiger = Auth::user()->gebr_naam;
        Mail::to($nieuwspeler)-> send(new NieuwSpeler($nieuwspeler, $nieuwspeler_naam, $nieuwspeler_naam));
        
        
        return redirect('/profiel');
    }
}
    
    
//        $spelerIds = $request->input('speler');
//        
//        foreach($spelerIds as $id) {
//            $speler = User::findOrFail($id);
//            echo $speler->email;
//        }
//        
//        die();
//        
//        dd($request);
        
//        $nspelermax = 4;
//        $spel = $request->input('spel');
//        
//        $aanvangstijdstip = $request->input('aanvangstijdstip');
//        
//        $spelers = $request->input('speler');
//        
//        for ($i = 0; $i < $nspelermax; $i++) {
//            if ($request->input('speler')) {
//                
//                if ($i > 0) {
//                    $speler_email[$i] = User::findOrFail($spelers[$i])->email;
//                    Mail::to($speler_email[$i])->send(new SpelAccepteren($spel, $spelers, $aanvangstijdstip));
//                }
//            }
//        }
//    }
//}

