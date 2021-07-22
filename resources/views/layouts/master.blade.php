
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" ></script>
      <script src="{{asset('js/jquery.min.js')}}"></script>


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet"  href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <!-- Styles -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    
 <link rel="stylesheet" type="text/css" href="css/style.css">

<link rel="stylesheet" href="https://unpkg.com/leaflet@1.5.1/dist/leaflet.css"
   integrity="sha512-xwE/Az9zrjBIphAcBb3F6JVqxf46+CDLwfLMHloNu6KEQCAWi6HcDUbeOfBIptF7tcCzusKFjFw2yuvEpDL9wQ=="
   crossorigin=""/>

    <script src="https://unpkg.com/leaflet@1.5.1/dist/leaflet.js"
   integrity="sha512-GffPMF3RvMeYyc1LWMHtK8EbPv0iNZ8/oTtHPx9/cc2ILxQ+u905qIwdpULaqDkyBKgOaB57QTMg7ztg8Jm2Og=="
   crossorigin=""></script>
      <link rel="stylesheet" href="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.css" />
 <script src="http://unpkg.com/leaflet@1.3.1/dist/leaflet.js"></script>
  <script src="js/leaflet-providers.js"></script>
   <script src="https://unpkg.com/leaflet-control-geocoder/dist/Control.Geocoder.js"></script>

         

</head>
<body>
    
    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="{{ url('home') }}">
                    {{ config('app.name', 'Emergency') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>
                 
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                    
                       <li class="nav-item">
                       
                     @if ( auth()->user()->job=="Ambulancier")

                       <a class="nav-link" href="{{url('ambulance')}}">Nos Destination</a>

                       
                      
                       
                        @else
                         <a class="nav-link" href="{{url('patient')}}">List des patient</a>
                       

                       @endif
                       </li>
            @if ( auth()->user()->job=="Infirmier")
                   <li class="nav-item">
   <a class="nav-link" href="{{url('soin')}}">List des soins</a>
   </li>
          @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                   
                                   @if(Auth::user()->job=="Médecin") 
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('dis').submit();">
                                        {{ __('Disponible') }}
                                    </a>
                                     <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('occ').submit();">
                                        {{ __('Occuper') }}
                                    </a>
                                    <form id="dis" action="{{url('ambulance/'.auth()->user()->id)}}" method="post">
                                      @csrf
                                      <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden"  value="1" name="dispo">
                                   
 
                                    </form>
                                    <form id="occ" action="{{url('ambulance/'.auth()->user()->id)}}" method="post">
                                      @csrf
                                      <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden"  value="0" name="dispo">
                                   
 
                                    </form>
                                    @endif
                                     @if(Auth::user()->job=="Ambulancier") 
                                    <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('dis').submit();">
                                        {{ __('Disponible') }}
                                    </a>
                                     <a class="dropdown-item" href="#"
                                       onclick="event.preventDefault();
                                                     document.getElementById('occ').submit();">
                                        {{ __('Occuper') }}
                                    </a>
                                    <form id="dis" action="{{url('ambulance/'.auth()->user()->id)}}" method="post">
                                      @csrf
                                      <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden"  value="1" name="dispo">
                                   
 
                                    </form>
                                    <form id="occ" action="{{url('ambulance/'.auth()->user()->id)}}" method="post">
                                      @csrf
                                      <input type="hidden" name="_method" value="PUT">

                                        <input type="hidden"  value="0" name="dispo">
                                   
 
                                    </form>
                                    @endif
                                     <a class="dropdown-item" href="{{ route('login') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        @if(session('success'))

        <div class="alert alert-default"style="color:#49a570;font-size:1.3em;margin-left:40%;margin-top:40px;">
        {{session('success')}}

        </div>
        @endif
        @if(auth()->user()->job=="Médecin")
         @if(auth()->user()->job=="Médecin" && auth()->user()->dispo==1 )
        
         <div class="alert alert-default"style="color:#49a570;font-size:1.3em;margin-left:40%;margin-top:40px;">
          <?php
          echo ('Vous étes disponible');
          ?>
          </div>
        @else
        <div class="alert alert-default"style="color:#49a570;font-size:1.3em;margin-left:40%;margin-top:40px;">

         <?php
          echo ('Vous étes occuper');
          ?>
          @endif
        </div>
        @endif
          @if(auth()->user()->job=="Ambulancier")
         @if(auth()->user()->job=="Ambulancier" && auth()->user()->dispoau==1 )
        
         <div class="alert alert-default"style="color:#49a570;font-size:1.3em;margin-left:40%;margin-top:40px;">
          <?php
          echo ('Vous étes disponible');
          ?>
          </div>
        @else
        <div class="alert alert-default"style="color:#49a570;font-size:1.3em;margin-left:40%;margin-top:40px;">

         <?php
          echo ('Vous étes occuper');
          ?>
          @endif
        </div>
        @endif
        <main class="py-4">
            @yield('content')

        </main>
        @yield('javascript')
    </div>
</body>
</html>




