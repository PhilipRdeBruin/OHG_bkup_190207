
@extends('layouts.standaard')
@section('content')

<div class="container">
    <div class="row justify-content-center mt-4">
<div class="container col-md-8" style="text-align:center">
      <h1><span class="kl_blauw">Kennis toevoegen</span></h1><br>
        </div>
    </div>
      <div class="row justify-content-center">
          <div class="container col-md-8" style="text-align:center">
   
            
    </div>
          
    </div>
       <div class="row justify-content-center">
          <div class="container col-md-4">
        <div class="card mt-5">
         <div class="card-header" style="text-align:center"><b>Kennis toevoegen</b>
             <p>Hier onder kunt een speler selecteren om deze toe te voegen als vriend. Als de speler uw uitnodiging accepteert dan kunt u eenvoudig een afspraak met hem of haar maken. </p></div>
         <div class="card-body">
             <p style="text-align:center"><b>Selecteer een vriend</b></p>
             <div class="row justify-content-center">
             <form method="POST" action="{{ route('vriendtoevoegen') }}"> 
                @csrf
                 <select name="vriend">
    @foreach ($users as $user)
           <?php 
           $vn=$user->voornaam;
           $tv=($user->tussenv != NULL) ? " " . $user->tussenv : "" ;
           $an=$user->achternaam;
           $vriend=$vn.$tv. " " . $an;
           
           ?>
            <option value="{{$user->id}}">{{$vriend}}</option>  
    @endforeach
    
                </select>
               
              <div class="row justify-content-center mt-2">
              <input type="submit">
                  
                  
                 
                  
                 </div>
                  </form>
             </div>
            </div>
              </div>
           </div>
                 
        
          <div class="container col-md-4">
        <div class="card mt-5">
         <div class="card-header" style="text-align:center"><b>Nieuwe speler uitnodigen</b>
             <p>Staat u kennis nog niet geregistreerd in ons systeem. Nodig hem/haar dan uit in Nieuwe speler!</p> 
            </div>
         <div class="card-body">
             <div class="row justify-content-center"> 
             <form method="POST" action="{{ route('nieuwspelertoevoegen')}}"> 
                 @csrf
                 <div class="row justify-content-center">
                     <label><b>Naam</b></label></div>
                     <div class="row justify-content-center">
                         <input type="text" name=naam> </div>
                    <div class="row justify-content-center mt-2">
                     <label><b>e-mailadres</b></label></div>
                     <div class="row justify-content-center mt-2">
                 <input type="email" name="email">
                 </div>
                 <div class="row justify-content-center mt-3">
                     <input type="submit"></div>
                 </form>
        

             </div>
             
            </div>
              </div>
              
         
</div>

</div>
    
</div>

                

          
@endsection