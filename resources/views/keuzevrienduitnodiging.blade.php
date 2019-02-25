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
    // dd($spelletjes);
    $active_navlink = 'keuzevrienduitnodiging'; 
    $filterkey = "filter"; 
    $pict = rand(1, 16);
    $alias = $spelletjes->where('id', $pict)->first()->alias;

    // phpAlertx("pict, alias = $pict, $alias");

    foreach ($spelletjes as $spelletje) {
        $parameter['id'] = $spelletje->id;
        $parameter['nsplr'] = $spelletje->aantalspelers;
        $parameter['rol'] = $spelletje->rollen;
    }
?>

@extends('layouts.standaard')

@section('content')

<div class="login_bkgr" style="background-image: url(../afbeeldingen/spellen/{{ $alias }}.png); z-index:0"></div>
<div class="unlogin_bkgr" id="main">
    <!-- Titel-blok -->
    <div class="row justify-content-center mt5 titeldiv">
        <div class="col-md-12 titeltekst" style="text-align:center">
            <h1>Kennis uitnodigen</h1>
        </div>
    </div>

    <div class="row justify-content-center mt5 bodydiv">
    <!-- links -->           
        <div class="col-md-6">
            <div class="leftblock">
                <h5>Reserveer hier een spel,<br>en stuur de uitnodiging per mail naar uw medespeler(s)</h5>

                <form id="form_speleruitnodigen" method="post" action="{{ route('actiefspeltoevoegen') }}">
                    @csrf

                    <div class="row justify-content-center">
                        <div class="col-md-3">
                            spel:
                        </div>

                        <div class="col-md-5" style="padding:0">                        
                            <!-- <select class="form-control" onchange="showxspelers('{{ $spelletjes }}')" name="spel" id="spelx"> -->
                            <select class="form-control" onchange="showxspelers()" name="spel" id="spelx">
                                <option value="leeg" selected></option>
                                @foreach($spelletjes as $value)
                                    <option value="{{ $value->id }}">{{ $value->spel_naam }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-4" id="rol_hdr" style="padding:15px 10px 0 30px">
                            <u><i>Rol/Team</u></i>
                        </div>
                    </div>
                    <hr/>
                    @for ($i=1; $i<=4; $i++)
                        <div class="row justify-content-center">
                            <div class="col-md-3" id="spelerlabel{{ $i }}">
                                @if ($i == 1)
                                    gastheer:
                                @else
                                    speler{{ $i }}:
                                @endif                               
                            </div>

                            <div class="col-md-5" style="padding:0">
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

                                    @foreach($user->vrienden->sortBy('achternaam') as $vriend)
                                        <?php
                                            $vn = $vriend->voornaam;
                                            $tv = ($vriend->tussenv != NULL) ? " " . $vriend->tussenv : "" ;
                                            $an = $vriend->achternaam;
                                            $vriendy = $vn . $tv . " " . $an;           
                                        ?> 
                                        <option value="{{ $vriend->id }}">{{ $vriendy }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-4" style="padding:0">
                                <select class="form-control" name="rol{{ $i }}" id="rol{{ $i }}">
                                    <option value="leeg" selected></option>
                                </select>    
                            </div>
                        </div>
                    @endfor
                    <hr/>
                    <div class="row justify-content-center">
                        <div class="col-md-4">
                            aanvangstijdstip:
                        </div>

                        <div class="col-md-4">
                            <input required type="date" style="text-align:center" id="aanvangsdatum" name="aanvangsdatum" onblur=zetdatumtijd()>
                        </div>

                        <div class="col-md-4">
                        <input required type="time" style="text-align:center" id="aanvangstijd" name="aanvangstijd" onblur=zetdatumtijd()>
                        </div>

                        <input type="hidden" id="aanvangstijdstip" name="aanvangstijdstip">
                    </div>
                    <input id="speluitnodigenknop" type="submit" value="Uitnodiging versturen">
                </form>
            </div>
        </div>

        <div id="spelletjes" style="display:none">{{ $spelletjes}}</div>        
        <script>
            spel = document.getElementById("spelx");
            if (spel.value > 0) { 
                spelletjes = document.getElementById("spelletjes").innerHTML;
                showxspelers();
            };
        </script>

    <!-- rechts -->
        <div class="col-md-6">
            <div class="rightblock">
                <h5 id="vriendenOnline">
                    Hieronder ziet uw uw vrienden die op dit moment online zijn.
                </h5>    

                <div class="row"> <!-- justify-content-center -->                    
                    <?php $i = 1; $nvr = 0; ?>              
                    @foreach($user->vrienden->sortBy('achternaam') as $vriend)
                        @if($vriend->isOnline())
                            <div class="col-md-5 card-vriend card-vriend{{ $i }}">
                                <?php
                                    $i = ($i == 1) ? 2 : 1; 
                                    $nvr++;
                                    $vn = $vriend->voornaam;
                                    $tv = ($vriend->tussenv != NULL) ? " " . $vriend->tussenv : "" ;
                                    $an = $vriend->achternaam;
                                    $vriendy = $vn . $tv . " " . $an;           
                                ?>

                                <form action = "{{ route('naarChat', ['vriend' => $vriend->gebr_naam ]) }}" method = "POST" > 
                                    @csrf    
                                    <div class="card mt-4">   
                                        <div class="card-header">                     
                                            {{$vriendy}}                                                
                                        </div>
                                        
                                        <div class="card-body">
                                            <img class="card-img-top" src="{{ asset('afbeeldingen/vrienden/' . $vriend->gebr_naam . '.png') }}" alt="Card image cap">
                                        </div>

                                        <input type="submit" class="btn btn-primary btn-mpl" style="font-weight:bold" value="kies samen een spel">
                                    </div>
                                </form>
                            </div>               
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
            </div>             
        </div>
    </div>
</div>

@endsection

<?php

    // dd($spelletjes);
    // function phpAlertx($msg) {
    //     echo '<script type="text/javascript">alert("' . $msg . '")</script>';
    // }
?>
