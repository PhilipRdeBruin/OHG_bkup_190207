
<?php $active_navlink = "notnav" ?>

@extends('layouts.standaard')

@section('content')
<!-- <div class = "row"> -->

<!--    <img src="/afbeeldingen/compilatie1.png" id = "compilatie">   -->

<!-- <div class="container">
    <div class="row justify-content-center mt-5">
    <div class="col-md-1"> </div>
    <div class="col-md-9">
        
        <h2 class="kl_dgrijs" id="welkom">D&#233; <span class="kl_blauw"><b>Spelletjes</b></span> website 
            waar je <span class="kl_oranje"><u>m&#233;t</u></span> elkaar en 
            <span class="kl_oranje"><u>tegen</u></span> elkaar<br/>
            traditionele spelletjes kunt spelen alsof je bijelkaar aan tafel zit.</h2>
    </div>
        <div class="col-md-2"> </div>
    </div>

    <div class="row justify-content-center mt-3">
        
    <div class="row welkomknoppen">
        <div class="col-md-4">
                <button type="button" class="knop-mpl knop-inlog" onclick="document.location='/login'">Inloggen<br/><span class="px-28">(Ik ben<br/> reeds lid)</span></button>
            </div>
        </div>
        <div class="col-md-4"></div>
        <div class="col-md-4">
             <div class="row justify-content-center">
                <button class="knop-mpl knop-inlog" onclick="document.location='/register'">Aanmelden<br/>als<br/>nieuw lid</button>
            </div>
        </div>
    </div>
<br>
 <div class="row justify-content-center mt-5">
    <div class="col-md-8">
     <div class="row" style="clear:left">
    <div class="col" style="display: flex;">
        <div class="hulpinfo ml-auto my-auto">Indien u ergens vragen over heeft of assistentie bij verlangt, kunt u met deze knop hulp opvragen.</div>
    </div>
        <img src="{{ asset('icons/help-icon.png') }}" alt="HULP-knop" height="90px">
    </div>
</div>
     </div>
    </div> -->


    <body>
        @guest
        @else
            <script>
            location.href='/keuze';
            </script>
        @endguest
        <div class="myVideo">
            <video src="{{asset('mp4/chess.mp4')}}" type="video/mp4" autoplay muted loop></video>
        </div>
        
        <div id="index">              
            <div id="slogan"><p><i>&#8220;De nieuwe spellen sensatie op het internet&#8221;</i></p></div>
            <div class="row justify-content-center" id="landr">
                <div class="col-md-2 col-md-offset-3" id="login" onclick="location.href = '/login'"><p>Aanmelden</p></div>
                <div class="col-md-2"></div>
                <div class="col-md-2" id="register" onclick="location.href = '/register'"><p>Registreren</p></div>
            </div>
        </div>
    </body>


@endsection
