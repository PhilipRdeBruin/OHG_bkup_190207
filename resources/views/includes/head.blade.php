
<title>OudHollandGames</title>


<meta charset="iso-8859-1">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta name="description" content="Oud Hollandse Spelletjes">
<meta name="keywords" content="Oud Hollandse Spelletjes">
<meta name="author" content="Philip de Bruin, Herger Dillema, Hans van der Poel, Jacomijn Steen">

<script src="https://code.jquery.com/jquery-3.1.1.js"></script>
<script src="{{ asset('js/ohgames.js') }}"></script>
<script src="{{ asset('js/ohg.js') }}"></script>

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
<link href="https://fonts.googleapis.com/css?family=Lato:900" rel="stylesheet">

<link rel = "stylesheet" href = "{{ asset('css/algemeen.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/style.css') }}"/>
<link rel = "stylesheet" href = "{{ asset('css/ohgames.css') }}"/>
<!-- <link rel = "stylesheet" href = "{{ asset('css/keuze.css') }}"/> -->

<link rel = "stylesheet" href = "{{ asset('css/ohg.css') }}"/>
<link rel="stylesheet"  href="{{ asset('css/KVU.css') }}" />

<?php
    $server = "192.168.2.6";        // PC: De Knolle
    // $server = "192.168.2.9";        // laptop: De Knolle
    // $server = "192.168.2.12";       // laptop: De Ljurk
    // $server = "192.168.1.32";       // laptop: Ingrid en Martin
    // $server = "192.168.2.84";       // laptop: code gorilla
    require_once($_SERVER['DOCUMENT_ROOT'] . '/functions/php_functies.php');
?>
