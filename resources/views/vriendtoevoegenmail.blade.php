

<!doctype html>

<html>
<head> </head>
<body>

<h1> Hallo {{$vriend_naam}}, </h1>
    
    <p>Leuk dat u ook aangemeld bent bij Oud Hollands Gamen! Graag zou<b> {{$gebr_naam}}</b> u willen toevoegen aan zijn/haar vriendenlijst! Klik op onderstaande link om de uitnodiging te accepteren.</p>    
    
    
<a href="{{ route('vriendbevestigen', ['gebruiker_id' => $gebruiker_id, 'vriend_id' => $vriend_id]) }}">accepteren</a>    
    
    <p>met vriendelijke groet,<br>
    <b>Oud Hollands Gamen</b><br>
    <i>De nieuwe online spellensensatie voor ouderen!</i></p>

    </body>

</html>





