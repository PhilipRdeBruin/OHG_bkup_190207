<?php 
    namespace App\Http\Controllers;
    $active_navlink = 'profiel'; 
    $filterkey = "filter";
    $vrienden = \App\User::All();
    $spelletjes = \App\Spelletje::All();
    use \App\Spelletje;
?>

@extends('layouts.standaard')
@section('content')

<div class="main">
    <div class="row justify-content-center">
    <div class="col-md-8">
            <h1>Welkom op uw profielpagina!</h1><br>
    
                <h4>Hier onder vindt u een overzicht van uw persoonlijke gegevens. Daarnaast een lijst van uw kennissen.</h4>
</div>
    </div>
    <br>

    <div class="row justify-content-center" id = "profielweergave">
        <div class="col-md-6">

          <div class="profielBlok">
            <div class="profielHeader">
               <h2 style="margin-top:2vmin">Uw profiel</h2>
              </div>
        <div class="profielButton">
            <h1 style="margin-top:-2vmin;padding-top:0">&#8634;</h1>
        </div>
              <div class="col-md-8 mt-5">
<!--                        <h4>U kunt uw gegevens aanvullen of wijzigen</h4> -->
                 
                        
                            <form method="POST" action="{{ route('profiel.update') }}">
                            @csrf
                            @method('PUT')
                            <div class = "form-group row">                        
                                <label for="gebr_naam" class="col-md-4 col-form-label text-md-right">{{ __('Gebruikersnaam') }}</label>
                                <div class="col-md-8"  >
                                <input id="gebr_naam" type="text" class="form-control{{ $errors->has('gebr_naam') ? ' is-invalid' : '' }}" style="color:#46f; font-weight:bold" name="gebr_naam" value="{{ $user->gebr_naam }}" >
                                    @if ($errors->has('gebr_naam'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('gebr_naam') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        
                        <div class="form-group row">
                            <label for="voornaam" class="col-md-4 col-form-lael text-md-right">{{ __('Voornaam') }}</label>
                                <div class="col-md-8">
                                <input id="voornaam" type="text" class="form-control{{ $errors->has('voornaam') ? ' is-invalid' : '' }}" name="voornaam" value="{{ $user->voornaam }}" >

                                @if ($errors->has('voornaam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('voornaam') }}</strong>
                                    </span>
                                @endif
                                </div>
                        </div>

                        <div class="form-group row">
                            <label for="initialen" class="col-md-4 col-form-label text-md-right">{{ __('Initialen') }}</label>
                            <div class="col-md-8">
                                <input id="initialen" type="text" class="form-control{{ $errors->has('initialen') ? ' is-invalid' : '' }}" name="initialen" value="{{ $user->initialen }}">

                                @if ($errors->has('initialen'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('initialen') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tussenv" class="col-md-4 col-form-label text-md-right">{{ __('Tussenvoegsel') }}</label>
                            <div class="col-md-8">
                                <input id="tussenv" type="text" class="form-control{{ $errors->has('tussenv') ? ' is-invalid' : '' }}" name="tussenv" value="{{ $user->tussenv }}">

                                @if ($errors->has('tussenv'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('tussenv') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="achternaam" class="col-md-4 col-form-label text-md-right">{{ __('Achternaam') }}</label>
                            <div class="col-md-8">
                                <input id="achternaam" type="text" class="form-control{{ $errors->has('achternaam') ? ' is-invalid' : '' }}" name="achternaam" value="{{ $user->achternaam }}" >

                                @if ($errors->has('achternaam'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('achternaam') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      

                        <div class="form-group row">
                            <label for="huisnr" class="col-md-4 col-form-label text-md-right">{{ __('Huisnummer') }}</label>

                            <div class="col-md-8">
                                <input id="huisnr" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="huisnr" value="{{ $user->huisnr }}" >

                                @if ($errors->has('huisnr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('huisnr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="postcode" class="col-md-4 col-form-label text-md-right">{{ __('Postcode') }}</label>

                            <div class="col-md-8">
                                <input id="postcode" type="text" class="form-control{{ $errors->has('postcode') ? ' is-invalid' : '' }}" name="postcode" value="{{ $user->postcode }}" >

                                @if ($errors->has('postcode'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('postcode') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="woonplaats" class="col-md-4 col-form-label text-md-right">{{ __('Woonplaats') }}</label>

                            <div class="col-md-8">
                                <input id="woonplaats" type="text" class="form-control{{ $errors->has('woonplaats') ? ' is-invalid' : '' }}" name="woonplaats" value="{{ $user->woonplaats }}">

                                @if ($errors->has('woonplaats'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('woonplaats') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                        <div class="form-group row">
                            <label for="telefoon" class="col-md-4 col-form-label text-md-right">{{ __('Telefoon-nummer') }}</label>

                            <div class="col-md-8">
                                <input id="telefoon" type="text" class="form-control{{ $errors->has('telefoon') ? ' is-invalid' : '' }}" name="telefoon" value="{{ $user->telefoon }}">

                                @if ($errors->has('telefoon'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('telefoon') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="mobielnr" class="col-md-4 col-form-label text-md-right">{{ __('Mobiel-nummer') }}</label>

                            <div class="col-md-8">
                                <input id="mobielnr" type="text" class="form-control{{ $errors->has('mobielnr') ? ' is-invalid' : '' }}" name="mobiel" value="{{ $user->mobiel }}">

                                @if ($errors->has('mobielnr'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('mobielnr') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Adres') }}</label>

                            <div class="col-md-8">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ $user->email }}" >

                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                      
                                               
                        <div class="form-group row mb-0">
                            <div class="col-md-5 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('updaten van uw gegevens') }}
                                </button>
                            </div>
                            </div>
                            </form>
                </div>
            <div class="col-md-2 mt-5">
            <div id="profielFoto">{{ __('foto') }}
                <input id="foto" type="file"
                    class="form-control{{ $errors->has('foto') ? ' is-invalid' : '' }}"
                    name="foto" value="{{ $user->efoto }}" > 
                </div>
              </div>
            </div>
        </div>
        
     
<!--lijst metvrienden-->            
            <div class="col-md-6">
         <div class="vriendBlok">
        <div class="vriendHeader">
            <h2 style="margin-top:2vmin">Kennis</h2>
             </div>
            
         <div class="vriendButton" onclick="document.location='/vriendtoevoegen'">
            <h1 style="margin-top:-2vmin;padding-top:0">+</h1>
                  <div class="col-md-6 mt-5">
        
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
                        
                    
             </div>
                    </div>
        
                    
                
                
                      
           
                
            
                    
                

                                            
                    </div>
                </div>
            </div>          
        </div>            
    </div>
</div>   
@endsection