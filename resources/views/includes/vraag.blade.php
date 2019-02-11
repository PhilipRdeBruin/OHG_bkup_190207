@if(!empty($vrtekst))
<br>
<div>
    <button onclick="vraagTekst()">
        <div id = "vraagteken" class="row" style="clear:left">
            <div class="col" style="display: flex;">
                <div class="hulpinfo ml-auto my-auto">Kunnen we u helpen </div>
            </div>
            <div class="col"> 
                <img src="{{ asset('icons/help-icon.png') }}" alt="HULP-knop" height="90px">
            </div>
        </div>
    </button>  
</div>

<div id = "vraagtekst">
<p>{{ $vrtekst }}</p>
</div>

<script>
function vraagTekst() {
  var x = document.getElementById("vraagtekst");
  if (x.style.display === "none") {
    x.style.display = "blok";
  } else {
    x.style.display = "none";
  }
}
</script>
@endif
