@extends('layouts.standaard')
@section('content')
   <div>
        {{ $uitgenodigde->gebr_naam }}
        {{ $gebruiker->gebr_naam }}
        {{ $spel->spel_naam }}
   </div>

@endsection