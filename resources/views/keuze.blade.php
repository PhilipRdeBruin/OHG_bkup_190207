
<?php 
    // $active_navlink = 'homepage';
    $server = "192.168.2.6";
?>

@extends('layouts.standaard')

@section('content')

    <div id="main">
        <div class="row justify-content-center" id="choice">
            <div class="col-md-6 col-sm-12" style="height:100%"> 
                <div id="friends" onclick="location.href='/keuzevrienduitnodiging'">
                    <div class="spacer"></div>
                    <div class="title">
                        <div id="arrowleft"></div>
                        <h2 class="left">
                            Speel samen<br>
                            met vrienden
                        </h2>
                    </div>
                </div>
            </div>

            <div class="col-md-6 col-sm-12" style="height:100%">
                <div id="game" onclick="location.href='/spelkeuze'">
                    <div class="spacer"></div>
                    <div class="title">
                        <div id="arrowright"></div>
                        <h2 class="right">
                            Kies direct <br>
                            een spel uit
                        </h2>
                    </div>
                </div>
            </div>
        </div>

        <div class="clear"></div>
        <div id="of" onclick="notify()">
            <h3>OF</h3>
        </div>

        @if (!empty($actievespellen))
            <div id="notifications">
                <?php $cnt = 0; ?>
                @foreach ($actievespellen as $actiefspel)
                    <?php 
                        $cnt++;
                        $datum = $actiefspel->aanvangstijdstip;
                        $datum = date_format(date_create($datum), "j M Y  g:i A");
                    ?>
                    <div class="notification">
                        <p style="width:80%;line-height:2">{{ $actiefspel->spelletje->spel_naam }} <br> {{ $datum }}</p>
                        <div onclick="document.getElementById('actspel').submit()" class="spelen">
                            <p>Speel</p>
                        </div>
                        <form id="actspel" method="POST" action="http://{{ $server }}/{{ $actiefspel->spelletje->link }}">
                            <input type="hidden" name="act_spel" value="{{ $actiefspel->id }}">
                            <input type="hidden" name="speler" value="{{ $gebruiker->id }}">
                            <input type="hidden" name="rol" value="{{ $actiefspel->pivot->rol }}">
                        </form>
                    </div>
                @endforeach
            </div>
            @if ($cnt > 0)
                <script>notify();</script>
            @endif
        @endif
    </div>

@endsection
