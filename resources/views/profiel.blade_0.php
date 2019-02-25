<?php
    namespace App\Http\Controllers;
    use Illuminate\Support\Facades\Session;
    use \App\Spelletje;
    use App\Http\Controllers\Carbon\Carbon;
    $active_navlink = 'profiel'; 
    $filterkey = "filter";
    $vrienden = \App\User::All();
    $spelletjes = \App\Spelletje::All();
    
    ?>
@extends('layouts.standaard')
@section('content')
<div id="main">
    <div class="vriendBlok">
        <div class="vriendHeader">
            <h2 style="margin-top:2vmin">Vrienden</h2>
        </div>
        <div class="vriendButton" onclick="document.location='/vriendtoevoegen'">
            <h1 style="margin-top:-2vmin;padding-top:0">+</h1>
        </div>
        <div class="custom select">
            <select>
                @foreach($user->vrienden as $vriend)   
                <?php 
                    $vn=$vriend->voornaam;
                    $tv=($vriend->tussenv != NULL) ? " " . $vriend->tussenv : "" ;
                    $an=$vriend->achternaam;
                    $vrienden=$vn.$tv. " " . $an;
                    ?>
                <option value="{{$vriend->id}}">{{$vrienden}}</option>
                @endforeach 
            </select>
        </div>
        <div class="vriendSelectie">
            <div class="profielLabel">Gebruikersnaam</div>
            <div class="invoerLabel">{{$vriend->gebr_naam}}</div>
            <div class="profielLabel">Voornaam</div>
            <div class="invoerLabel">{{$vriend->voornaam}}</div>
            <div class="profielLabel">Tussenvoegsel</div>
            <div class="invoerLabel">{{$vriend->tussenv}}</div>
            <div class="profielLabel">Achternaam</div>
            <div class="invoerLabel">{{$vriend->achternaam}}</div>
            <div class="profielLabel">Woonplaats</div>
            <div class="invoerLabel">{{$vriend->woonplaats}}</div>
            <div class="profielLabel">E-mailadres</div>
            <div class="invoerLabel">{{$vriend->email}}</div>
        </div>
        <div class="vriendSelectie1">
            <div id="profielFoto"> </div>
        </div>
    </div>
    <div class="profielBlok">
        <div class="profielHeader">
            <h2 style="margin-top:2vmin">Uw profiel</h2>
        </div>
        <div class="profielButton">
            <h1 style="margin-top:-2vmin;padding-top:0">&#8634;</h1>
        </div>
        <div class="profielGegevens">
            <table>
                <td>
                    <form method="POST" action="{{ route('profiel.update') }}">
                        @csrf
                        @method('PUT')
                        <div class="profielLabel">{{ __('Gebruikersnaam') }}</div>
                        <input id="gebr_naam" type="text" class="invoerLabel"{{ $errors->has('gebr_naam') ? ' is-invalid' : '' }}" style="color:#46f; font-weight:bold" name="gebr_naam" value="{{ $user->gebr_naam }}" >
                        @if ($errors->has('gebr_naam'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('gebr_naam') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Voornaam') }}</div>
                        <input id="voornaam" type="text" class="invoerLabel"{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" value="{{ $user->voornaam }}" >
                        <div class="profielLabel">{{ __('Tussenvoegsel') }}</div>
                        <input id="tussenv" type="text" class="invoerLabel"{{ $errors->has('tussenv') ? ' is-invalid' : '' }}" name="tussenv" value="{{ $user->tussenv }}">             @if ($errors->has('tussenv'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('tussenv') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Achternaam') }}</div>
                        <input id="achternaam" type="text" class="invoerLabel"{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ $user->achternaam }}" >
                        @if ($errors->has('achternaam'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('achternaam') }}</strong>
                        </span>
                        @endif     
                        <div class="profielLabel">{{ __('Straatnaam') }}</div>
                        <input id="straatnaam" type="text" class="invoerLabel"{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="straatnaam" value="{{ $user->straatnaam }}" >
                        @if ($errors->has('huisnr'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('huisnr') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Huisnummer') }}</div>
                        <input id="huisnr" type="text" class="invoerLabel"{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="huisnr" value="{{ $user->huisnr }}" >
                        @if ($errors->has('huisnr'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('huisnr') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Postcode') }}</div>
                        <input id="postcode" type="text" class="invoerLabel"{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ $user->postcode }}" >
                        @if ($errors->has('postcode'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('postcode') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Woonplaats') }}</div>
                        <input id="woonplaats" type="text" class="invoerLabel"{{ $errors->has('woonplaats') ? ' is-invalid' : '' }}" name="woonplaats" value="{{ $user->woonplaats }}">
                        @if ($errors->has('woonplaats'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('woonplaats') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Telefoonnummer') }}</div>
                        <input id="telefoon" type="text" class="invoerLabel{{ $errors->has('telefoon') ? ' is-invalid' : '' }}" name="telefoon" value="{{ $user->telefoon }}">
                        @if ($errors->has('telefoon'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('telefoon') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('Mobiel-nummer') }}</div>
                        <input id="mobielnr" type="text" class="invoerLabel"{{ $errors->has('mobielnr') ? ' is-invalid' : '' }}" name="mobiel" value="{{ $user->mobiel }}">
                        @if ($errors->has('mobielnr'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('mobielnr') }}</strong>
                        </span>
                        @endif
                        <div class="profielLabel">{{ __('E-Mail Adres') }}</div>
                        <input id="email" type="email" class="invoerLabel"{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >
                        @if ($errors->has('email'))
                        <span class="invalid-feedback" role="alert">
                        <strong>{{ $errors->first('email') }}</strong>
                        </span>
                        @endif
                        <button type="submit" class="btn btn-primary">
                                    {{ __('updaten van uw gegevens') }}
                                </button>
                    </form>
                </td>
            </table>
        </div>
        <div class="profiel2">
            <div id="profielFoto">{{ __('foto') }}
                <input id="foto" type="file"
                    class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                    name="foto" value="{{ $user->efoto }}" > 
            </div>
        </div>
    </div>
</div>
@endsection