
<nav class="navbar navbar-light navbar-expand-lg navbar-mpl navbar_header">
    <div id="logo" style="cursor:pointer" onclick="location.href = '/'">
    </div>
    <!-- <a class="navbar-brand" id="titel"><b><i><span class="kl_wit vet">O</span>ud Hollands Gamen</i></b></a> -->

    @if(empty($active_navlink))
        <?php $active_navlink = ""; //TODO: refactor active links ?>
    @endif
    <?php $act_lnk = init_ActiveLinks($active_navlink) ?>
    <?php // phpAlert("Hallo Nav!"); ?>
    
    <div class="mr-auto"> </div>
        <!-- <a class="navbar-brand mx-auto" id="titel"><b><i><span class="kl_wit vet">O</span>ud Hollands Gamen</i></b></a> -->
        <div class="ml-auto">
            <div class="collapse navbar-collapse " id="navbarCollapse">
                <ul class="navbar-nav">

                    @guest
                    @else
                        <li class="navbar-item li_navbar">
                            <a href="/keuze" class="nav-link {{ $act_lnk['login'] }}" style="color:white">Startpagina</a>
                        </li>
                    @endguest
                    
                    <li class="nvabar-item li_navbar">
                        <a href="/contact" class="nav-link {{ $act_lnk['login'] }}" style="color:white">Contact</a>
                    </li>

                    @guest
                    @else
                        <li class=" nvabar-item li_navbar">
                            <a href="/profiel" class="nav-link {{ $act_lnk['login'] }}"style="color:white">Mijn Profiel</a>
                        </li>
                    @endguest

                    <li class=" nvabar-item li_navbar btn-group">
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
        </div>
        <button style="background:#108ea7" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
    </div>
</nav>
