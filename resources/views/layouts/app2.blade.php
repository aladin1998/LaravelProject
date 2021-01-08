<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<script>
    function submitForm(btn) {
        // disable the button
        btn.disabled = true;
        // submit the form    
        btn.form.submit();
    }
</script>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Class</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!--  bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
 <!-- bootstrap cdn-->
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
	  <link href="{{ asset('css/all.css') }}" rel="stylesheet"> 

    

</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/login') }}">
                    
                    <img src="{{ URL::asset('images/logo.jpeg')}}" alt="" width="180" heigth="50">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                   
                    <li class="nav-item active">
                    @auth

                   
                      @if(auth()->user()->is_represantant == 1 )  
        <a class="nav-link" href="{{route('rep.home')}}"><i class="fas fa-home"></i>Accueil <span class="sr-only">(current)</span></a>
               @elseif(auth()->user()->is_represantant == 0 && auth()->user()->is_admin == 0)  
               <a class="nav-link" href="{{route('home')}}"><i class="fas fa-home"></i>Accueil <span class="sr-only">(current)</span></a>
               @elseif(auth()->user()->is_admin == 1 && auth()->user()->is_represantant == 0)  
               <a class="nav-link" href="{{route('admin.home')}}"><i class="fas fa-home"></i>Accueil <span class="sr-only">(current)</span></a>

             @else 
             <p>erreur</p>
             
              @endif  
              @endauth
      </li>
  
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
                                <a class="dropdown-item" href="{{ route('myAccount') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('myAccount-form').submit();">
                                        <i class="fas fa-user-circle"></i> {{ __('Mon compte') }}
                                    </a>
                                   
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                       <i class="fas fa-sign-out-alt"></i>  {{ __('Déconnecter') }}
                                    </a>
                                   
                                   

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                    <form id="myAccount-form" action="{{ route('myAccount') }}" method="GET" style="display: none;">
                                        @csrf
                                    </form>

                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
        
            @yield('content')
        </main>

    
        


    @if(auth()->user()->is_represantant == 1 && auth()->user()->is_admin == 0)  
    <div class="text-center">
  <a  href="/pfaV1.0/public/rep/home"  class="btn btn-primary">Revenir à la page d'accueil</a>
</div>               @elseif(auth()->user()->is_represantant == 0 && auth()->user()->is_admin == 0)  
               <div class="text-center">
  <a  href="/pfaV1.0/public/home"  class="btn btn-primary">Revenir à la page d'accueil</a>
</div>       
@elseif(auth()->user()->is_admin == 1 && auth()->user()->is_represantant == 0)  
<div class="text-center">
  <a  href="{{route('admin.home')}}"  class="btn btn-primary">Revenir à la page d'accueil</a>
</div>   
             
              @endif  
    </div>
    <!-- JS-Bootstrap-->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
   <script>
   $('.datepicker').datepicker({
      language: 'fr'})
   </script>

</body>
</html>
