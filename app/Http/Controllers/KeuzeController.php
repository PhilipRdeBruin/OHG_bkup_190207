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
    use DateTime;



class KeuzeController extends Controller
{
    public function keuze() {
        $vrtekst = DB::table('vraagtekens')->where('naam', 'keuze')->value('vrtekst');
        //haal alle actieve spellen op van de ingelogde gebruiker
        $gebruiker = Auth::user();
        if ($gebruiker != null) {
            $straks = date("Y-m-d H:i:s", strtotime("-1 hours"));
            $actieve_spellen = $gebruiker->actieveSpelletjes()->where('gamestate', '!=', '99')->where('aanvangstijdstip', '>', $straks)->get();
            return view('keuze', ['vrtekst' => $vrtekst, 'actievespellen' => $actieve_spellen, 'gebruiker' => $gebruiker]);
        } else {
            return \Redirect::to('index');
        }
    }

    public function keuzevrienduitnodiging() {
        $vrtekst = DB::table('vraagtekens')->where('naam', 'keuzevrienduitnodiging')->value('vrtekst');
        $user = Auth::user();
        if ($user != null) {
            return view('keuzevrienduitnodiging', ['vrtekst' => $vrtekst, 'user' => $user]);
        } else {
            return \Redirect::to('index');
        }
    }

    public function naarChat($vriend){
        $gebruiker = Auth::user();
        $vriend = User::where('gebr_naam', $vriend)->first();

        return view('chat',[
            'gebruiker' => $gebruiker, 
            'vriend' => $vriend]);
    }
}


    function phpAlertx($msg) {
        echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    }
