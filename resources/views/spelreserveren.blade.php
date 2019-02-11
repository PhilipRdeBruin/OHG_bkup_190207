
@extends('layouts.standaard')
@section('content')



    <form method="post" action="{{route('spelaccepteren')}} ">
        @csrf
        <ul>
         <li class="li_unmarked"> <label>spel</label>
            <input type="text" name="spel"> </li>
            <li class="li_unmarked"><label>host</label>
            <input type="text" name="speler[]"></li>
            <li class="li_unmarked"><label>speler2</label>
            <input type="text" name="speler[]"></li>
            <li class="li_unmarked"><label>speler3</label>
            <input type="text" name="speler[]"></li>
            <li class="li_unmarked"><label>speler4</label>
            <input type="text" name="speler[]"></li>
            <li class="li_unmarked"><label>tijd</label>
            <input type="datetime" name="aanvangstijdstip"></li>
            <li class="li_unmarked"><input type="submit" value=beginnen></li>
        </ul>
    </form>


@endsection
