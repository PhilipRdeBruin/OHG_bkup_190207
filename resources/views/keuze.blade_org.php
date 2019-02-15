
<?php 
//    $active_navlink = 'homepage'; 
?>

@extends('layouts.standaard')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="row welkomknoppen">
        <div class="col-md-3">
                <button type="button" class="knop-mpl knop-keuze" onclick="document.location='/keuzevrienduitnodiging'">
                    Ik wil <u><i>eerst</i></u> een vriend<br/>
                    <span class="px-24"><i>(of meerdere vrienden)</i></span>
                    uitnodigen om mee te spelen
                </button>
                <div class="keuze-label">
                    En daarna kiezen we er een spel bij
                </div>
            </div>
            <div class="col-md-3"> </div>   
        <div class="col-md-3">
                <button class="knop-mpl knop-keuze" onclick="document.location='/spelkeuze'">
                    Ik wil <u><i>eerst</i></u> een spel kiezen
                </button>
                <div class="keuze-label">
                    En daarna nodig ik er &#233;&#233;n 
                    <span class="px-20"><u><i>(of meerdere)</i></u></span>
                     medespeler<span class="px-20">(s)</span> bij uit
                </div>
            </div>
        </div>

        @if(!empty($actievespellen))
            <div class="col-md-3" id="actievespellen" style="border:1px solid grey">
                <h4 id="actspelhdr" style="font-size:20px"><u>Geplande spelletjes</u></h4>
                @foreach($actievespellen as $actiefspel)
                    <div id=actspelcard>
                        <p id=actspel_ihdr>{{ $actiefspel->spelletje->spel_naam }}</p>
                        <p id=actspel_info>tijdstip: {{ $actiefspel->aanvangstijdstip }}</p>
                           <form id="actspel" method="POST" action="http://192.168.2.6/{{ $actiefspel->spelletje->link }}">
                        <input type="hidden" name="act_spel" value="{{ $actiefspel->id }}">
                        <input type="hidden" name="speler" value="{{ $gebruiker->id }}">
			<input type="hidden" name="rol" value="{{ $actiefspel->pivot->rol }}">
                        <input type="submit" class="spelknoppen" name="start_spel" value="Ga naar spel">
                    </form>
                    </div>
                    @endforeach
            </div>
        @endif

    </div>
</div>
   
@endsection

