<?php
    namespace App\Http\Controllers; 
    use Illuminate\Support\Facades\Schema;
    use Illuminate\Database\Schema\Blueprint;
    use Illuminate\Database\Migrations\Migration; 
    use Illuminate\Support\Facades\Auth;
    use \App\Spelletje;
    use \App\User;
    $vrienden = \App\User::All();
    $spelletjes = \App\Spelletje::All();
    $active_navlink = 'keuzevrienduitnodiging'; 
    $filterkey = "filter"; 

    foreach ($spelletjes as $spelletje) {
        $parameter['id'] = $spelletje->id;
        $parameter['nsplr'] = $spelletje->aantalspelers;
        $parameter['rol'] = $spelletje->rollen;
    }
?>

@extends('layouts.standaard')

@section('content')

<div class="conainer">
    <div class="row justify-content-center mt-5">
        <div class="col-md-6" style="text-align:center">
            <h1><span class="kl_blauw">Kennis uitnodigen</span></h1><br>
        </div>
    </div>

   
    <div class="row justify-content-center mt-5"> 
     <!--links-->       
        
        <div class="col-md-6">
            <h5 style="color:#24a;font-weight:bold">Reserveer hier een spel,<br>en stuur de uitnodiging per mail naar uw medespeler(s)</h5>
    

            <form id="form_speleruitnodigen" method="post" action="{{ route('actiefspeltoevoegen') }}" style="margin-top:40px">
                @csrf
                <table>
                    <tr>
                        <th style="width:30%>"><th style="width:30%>"><th style="width:30%>">
                    <tr>
                        <td>spel:</td>                        
                        <td>
                            <select class="form-control" onchange="showxspelers('{{ $spelletjes }}')" name="spel" id="spel">
                                <option value="leeg" selected></option>
                                @foreach($spelletjes as $value)
                                    <option value="{{ $value->id }}">{{ $value->spel_naam }}</option>
                                @endforeach
                            </select>
                        </td>
                        <td id="rol_hdr"><u><i>Rol/Team</u></i></td>
                    </tr>

                    @for ($i=1; $i<=4; $i++)
                        <tr>
                            <td id="spelerlabel{{ $i }}">
                                @if ($i == 1)
                                    gastheer:
                                @else
                                    speler{{ $i }}:
                                @endif
                            </td>                        
                            <td>
                                <select class="form-control" name="spelers[]" id="speler{{ $i }}">

                                    <?php
                                        $vn = Auth::user()->voornaam;
                                        $tv = (Auth::user()->tussenv != NULL) ? " " . Auth::user()->tussenv : "" ;
                                        $an = Auth::user()->achternaam;
                                        $vriendy = $vn . $tv . " " . $an;           
                                    ?> 

                                    @if ($i == 1) {
                                        <option value="{{ Auth::id() }}" selected>{{ $vriendy }}</option>
                                    @else
                                        <option value="leeg" selected></option>
                                    @endif

                                    @foreach($user->vrienden as $vriend)
                                        <?php
                                            $vn = $vriend->voornaam;
                                            $tv = ($vriend->tussenv != NULL) ? " " . $vriend->tussenv : "" ;
                                            $an = $vriend->achternaam;
                                            $vriendy = $vn . $tv . " " . $an;           
                                        ?> 
                                        <option value="{{ $vriend->id }}">{{ $vriendy }}</option>
                                    @endforeach
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="rol{{ $i }}" id="rol{{ $i }}">
                                    <option value="leeg" selected></option>
                                </select>                                        
                            </td>
                        </tr>
                    @endfor

                    <tr>
                        <td>aanvangstijdstip:</td>
                        <td>
<!--
                            <input required type="text" style="width:100px;text-align:center" id="aanvangsdatum" name="aanvangsdatum" placeholder="d-m-[jj]" onblur=zetdatum()>
                            <input required type="text" style="width:80px;text-align:center" id="aanvangstijd" name="aanvangstijd" placeholder="uu:mm" onblur=zettijd()>
                            <input type="hidden" name="aanvangstijdstip">
                            <span id="ampm" style="width:20px;text-align:center"></span>
-->
                            <input required type="text" name="aanvangstijdstip">
                        </td>
                    </tr>
                </table>
                <input id="speluitnodigenknop" type="submit" value="Uitnodiging versturen">
            </form>                            
        </div>

        <div id="spelletjes" style="display:none">{{ $spelletjes}}</div>
        <script>
            spel = document.getElementById("spel");
            if (spel.value > 0) { 
                spelletjes = document.getElementById("spelletjes").innerHTML;
                showxspelers(spelletjes);
            };
        </script>


    <!--rechts-->

    <div class="col-md-4 col-md-offset-2">
        <div class="row justify-content-center md-4">
            <h5 id="vriendenOnline" style="color:#24a;font-weight:bold">
                Hieronder ziet uw uw vrienden die op dit moment online zijn.
            </h5>
        <br>
    </div>       
        
    <div class="row">                    

        <?php $nvr = 0; ?>              
        @foreach($user->vrienden as $vriend)
            @if($vriend->isOnline())
                <?php $nvr++; ?>
                <form action = "{{ route('naarChat', ['vriend' => $vriend->gebr_naam ]) }}" method = "POST" > 
                @csrf    
                    <div class="card mt-4">   
                        <div class="card-header">                     
                            <li> {{$vriend->gebr_naam}}</li>
                                                
                        </div>

                        <div class="card-body">
                            <img class="card-img-top" src="..." alt="Card image cap">
                        
                        </div>                
                        <input type="submit" class="btn btn-primary" value="samen overleggen wat te spelen">
                        
                    </div>
                </form>               
                    
            @endif
        @endforeach

        <p id="content_vrienden-online" style="display:none">{{ $nvr }}</p>    
    </div>

    <script>
        nvrienden = document.getElementById("content_vrienden-online").innerHTML;
        if (nvrienden > 0) {
            txt = "Hieronder ziet uw uw vrienden die op dit moment online zijn.";
        } else {
            txt = "Er zijn momenteel geen vrienden van u online.";
        }           
        document.getElementById("vriendenOnline").innerHTML = txt;
    </script>       

@endsection