 <nav class="navbar navbar-light navbar-expand-lg navbar-mpl">
@if(empty($active_navlink))
     <?php $active_navlink = ""; //TODO: refactor active links ?>
@endif
<?php $act_lnk = init_ActiveLinks($active_navlink) ?>
    <div class="mr-auto"> </div>
     <a class="navbar-brand mx-auto" id="titel"><b><i>Oud Hollandse Spelletjes</i></b></a>



<div class="ml-auto">
    
<div class="collapse navbar-collapse " id="navbarCollapse">
    <ul class="navbar-nav">
        

        @if($active_navlink == "notnav")
            <span class="kl_blauw">xxxxxxxxxxxx</span>
        @else
            <li class="navbar-item">
                <a href="/keuze" class="nav-link {{ $act_lnk['login'] }}" 
                style="color:white">Startpagina</a>
            </li>
        @endif

         @if($active_navlink == "notnav")
            <span class="kl_blauw">xxxxxxxxxxxx</span>
         @else
            <li class="navbar-item">
                <a href="/profiel" class="nav-link {{ $act_lnk['login'] }}"style="color:white">Mijn Profiel</a>
            </li>
        @endif

        <li class="navbar-item btn-group">
                @guest
                    <a href="#" class="nav-link dropdown-toggle {{ $act_lnk['login'] }}" data-toggle="dropdown" style="color:white">Inloggen</a>
                    <div class="dropdown-menu">
                        <a href="/login" class="dropdown-item droplist-mpl">Inloggen</a>
                        <div class="dropdown-divider"></div>
                        <a href="/register" class="dropdown-item droplist-mpl">Registreren</a>
                    </div>
                @else
                    <div class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre style="color:white">
                            {{ Auth::user()->gebr_naam }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </div>
                @endguest
        </li>
        <li>
            <span class="kl_grijscol_grijs" style="margin-right:50px"></span>
        </li>				
    </ul>
    
    </div>
    <button class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
    <span class="navbar-toggler-icon"></span>
</button>
</div>
</nav>
