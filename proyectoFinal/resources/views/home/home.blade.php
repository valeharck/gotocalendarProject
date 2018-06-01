@extends('layout')

@auth
  @section('css')
      <link href="{{ asset('css/layout.css')}}" rel="stylesheet">
      <link href="{{ asset('css/notes.css')}}" rel="stylesheet">
      <link href="{{ asset('css/calendar.css')}}" rel="stylesheet">
      <link href="{{ asset('js/fullcalendar-3.9.0/fullcalendar.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous">
  @endsection
  @section('javascript')
      <script type="text/javascript" src="{{asset('js/home.js')}}" defer ></script>
  @endsection
  @section('content')
      <div class="container-fluid" id="wrapper">
          <div class="row">
              <nav class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
                  <h1 class="site-title"><a href="index.html"><em class="fa fa-rocket"></em> Brand.name</a></h1>

                  <a href="#menu-toggle" class="btn btn-default" id="menu-toggle"><em class="fa fa-bars"></em></a>

                  <ul class="nav nav-pills flex-column sidebar-nav">
                      <li class="nav-item"><a class="nav-link active" href="{{route('profile')}}"><em class="fa fa-dashboard"></em> Perfil <span class="sr-only">(current)</span></a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('blocNotas')}}"><em class="fa fa-calendar-o"></em> Bloc de Notas</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('recordatorios')}}"><em class="fa fa-bar-chart"></em> Recordatorios</a></li>
                      <li class="nav-item"><a class="nav-link" href="{{route('calendar')}}"><em class="fa fa-hand-o-up"></em>Calendario</a></li>
                  </ul>
                  <a href="{{route('logout')}}" class="logout-button"><em class="fa fa-power-off"></em> Signout</a>
              </nav>
              <main class="col-xs-12 col-sm-8 col-lg-9 col-xl-10 pt-3 pl-4 ml-auto">
                  <header class="page-header row justify-center">
                      <div class="col-md-6 col-lg-8" >
                          <h1 class="float-left text-center text-md-left">{{session()->get('user')->username}}</h1>
                      </div>
                      <div class="dropdown user-dropdown col-md-6 col-lg-4 text-center text-md-right">
                          <a class="btn btn-stripped dropdown-toggle" href="#" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <img src="{{asset('img/icon.png')}}" alt="profile photo" class="circle float-left profile-photo" width="50" height="auto">
                              <div class="username mt-1">
                                  <h4 class="mb-1">Username</h4>
                              </div>
                          </a>
                          <div class="dropdown-menu dropdown-menu-right" style="margin-right: 1.5rem;" aria-labelledby="dropdownMenuLink">
                              <a class="dropdown-item" href="{{route('profile')}}"><em class="fa fa-user-circle mr-1"></em>Perfil</a>
                              <a class="dropdown-item" href="{{route('logout')}}"><em class="fa fa-power-off mr-1"></em>Salir</a></div>
                      </div>
                      <div class="clear"></div>
                  </header>
                  @yield('page')
              </main>
          </div>
      </div>
      <!-- https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/index.html -->
      <!--<div id="wrapper" class="toggled">
          <div id="sidebar-wrapper" class="sidebar col-xs-12 col-sm-4 col-lg-3 col-xl-2">
              <ul class=" nav nav-pills flex-column sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="#">

                      </a>
                  </li>
                  <li class="nav-item"><a href="{{route('profile')}}"><span class="fa fa-user-circle mr-1 "></span>Perfil<span class="sr-only">(current)</span></a></li>
                  <li class="nav-item"><a href="{{route('blocNotas')}}" class="nav-link">Bloc de Notas</a></li>
                  <li class="nav-item"><a href="{{route('recordatorios')}}" class="nav-link">Recordatorios</a></li>
                  <li class="nav-item"><a href="{{route('calendar')}}" class="nav-link">Calendario</a></li>
                  <li id="last" class="nav-item"><a href="{{route('logout')}}" class="nav-link">Cerrar Sesión</a></li>
              </ul>
          </div>
          <div id="page-content-wrapper">
              <div class="container">



              </div>-->
          </div>
      </div>
      <script>
          $(document).ready(function () {

          })
      </script>
  @endsection
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

