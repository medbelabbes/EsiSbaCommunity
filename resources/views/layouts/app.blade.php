<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/fontawesome-free-5.0.6/on-server/css/fontawesome-all.min.css') }}" rel="stylesheet"
          type="text/css">


</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                        data-target="#app-navbar-collapse" aria-expanded="false">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                @if(Auth::user())

                    <ul class="nav navbar-nav">
                        <li><a href="{{ url('/home') }}">Accueil</a></li>
                        <li><a href="{{ url('/profile/'.Auth::User()->id) }}">Profile</a></li>
                        <li><a href="{{ route('amie.index') }}"
                               style="padding:5px;margin-top:7px;width:140px;height:37px">Amis</a></li>


                    </ul>
                @endif

            <!-- Right Side Of Navbar -->

                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-expanded="false" aria-haspopup="true">
                                <img src="/images/{{ Auth::user()->photo }}" class="img-circle user-img"/>
                                <span class="hidden-xs">{{ Auth::user()->nom }} {{ Auth::user()->prenom }}</span> <span
                                        class="caret"></span>
                            </a>

                            <ul class="dropdown-menu">
                                <li><a href="/profile/parametres/">Paramètres du compte</a></li>
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        Déconnexion
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                          style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>


                </ul>

                <ul class="nav navbar-nav navbar-right">

                    <li><a href="{{ route('invitation.index') }}" title="Invitations">
                            <i class="fa fa-users"></i>
                            @if(count(auth()->user()->unreadnotifications)>0)
                                <span class="badge badge-light">
                                            {{count(auth()->user()->unreadnotifications)}}
                                        </span>
                            @endif
                        </a></li>
                    <li><a href="{{ url('/conversations')}}" title="Conversations">
                            <i class="fa fa-envelope"></i>
                            @if(unreadCount()>0)
                                <span class="badge badge pill badge-danger">
                        {{unreadCount() }}
                    </span>
                            @endif
                        </a></li>

                    <!--bare de recherche -->
                    <form method="POST" action="{{action("AmieController@update",3)}}" role="search"
                          class="navbar-form navbar-left" role="search">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <input type="text" name="name_input" id="name_input">
                            <input type="hidden" name="_method" value="PUT" class="form-control" placeholder="Search">
                        </div>
                        <button type="submit" class="btn btn-default">Recherche</button>
                    </form>

                </ul>
                <!--Les amies-->

                @endguest
            </div>
        </div>
    </nav>
    @yield('content')

</div>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('scripts')

</body>
</html>
