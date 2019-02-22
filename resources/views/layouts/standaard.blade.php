
<!DOCTYPE html>
<html lang="nl">

   <head>
        @include('includes.head')
   </head>

    <body>
        @include('includes.nav')
        
        <section class="content">
            @yield('content')
        </section>
        
        @if(!empty($vrtekst))
            @include('includes.vraag')
        @endif

        @include('includes.scriptsrcs')
    </body>
</html>
