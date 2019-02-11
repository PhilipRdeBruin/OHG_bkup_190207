<?php
    namespace App\Http\Controllers; 
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration; 
    use Illuminate\Support\Facades\Auth;
    use Illuminate\Http\Request;
    use \App\Spelletje;
    use \App\User_Relation;
    use \App\User;
    use DB;



class KeuzeController extends Controller
{
    public function keuze(){
        $vrtekst = DB::table('vraagtekens')->where('naam', 'keuze')->value('vrtekst');
        //haal alle actieve spellen op van de ingelogde gebruiker
        $gebruiker = Auth::user();
        $actieve_spellen = $gebruiker->actieveSpelletjes()->where('gamestate', '!=', '99')->get();
        return view('keuze', ['vrtekst' => $vrtekst, 'actievespellen' => $actieve_spellen, 'gebruiker' => $gebruiker]);
    }

    public function keuzevrienduitnodiging() {
        $vrtekst = DB::table('vraagtekens')->where('naam', 'keuzevrienduitnodiging')->value('vrtekst');
        $user = Auth::user();
        return view('keuzevrienduitnodiging', ['vrtekst' => $vrtekst, 'user' => $user]);
    }

    public function naarChat($vriend){
        $gebruiker = Auth::user();
        $vriend = User::where('gebr_naam', $vriend)->first();

        return view('chat',[
            'gebruiker' => $gebruiker, 
            'vriend' => $vriend]);
    }
}