
<?php 
    $active_navlink = 'Spelkeuze';
    $spelletjes = App\Spelletje::All();
?>

@extends('layouts.standaard')
@section('content')
    <div id="main">
        <div id="gamesx" class="games">

            @foreach ($spelletjes->sortBy('spel_naam') as $spelletje)
                <!-- <div class="game spel{{ $spelletje->id }}"  -->
                <div class="game" 
                    style="background-image:url('/afbeeldingen/spellen/{{ $spelletje->alias }}.png')" 
                    onclick="location.href='spel/{{ $spelletje->id }}'">
                    <div class="titleBlok">
                        <h4>{{ $spelletje->spel_naam }}</h4>
                        <h5 id="spel{{ $spelletje->id }}">0</h5>
                        <div class="bullet"></div>
                    </div>
                </div>
            @endforeach
        </div> 
    </div>
    <script>resSite();</script>  

    <script>
        window.addEventListener('resize', function(event){
            resSite()
        });
    </script>

@endsection
