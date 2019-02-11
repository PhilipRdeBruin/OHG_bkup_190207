<!doctype html>

<html>
<head></head>
<body>
    <h1> Hallo {{$speler->gebr_naam}},</h1>
    <b>{{ $hostGebr->gebr_naam }}</b> wil op <b>{{$actiefSpel->aanvangstijdstip}}</b> <b>{{$spelnaam}}</b> met u spelen. Klik op onderstaande link om de uitnodiging te accepteren.
    <a href="{{ route('actiefspelaccepteren', ['pivotId' => $pivotId, 'speler' => $speler]) }}">spelbevestigen</a>  
    <p>met vriendelijke groet,<br>
    <b>Oud Hollands Gamen</b><br>
    <i>De nieuwe online spellensensatie voor ouderen!</i></p>
</body>
</html>