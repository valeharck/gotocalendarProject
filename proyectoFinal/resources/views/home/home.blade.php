@extends('layout')

@auth
  @section('css')
      <link href="{{ asset('css/layout.css')}}" rel="stylesheet">
  @endsection
  @section('javascript')
      <script type="text/javascript" src="{{asset('js/home.js')}}" defer ></script>
  @endsection
  @section('content')
      <!-- https://github.com/BlackrockDigital/startbootstrap-simple-sidebar/blob/master/index.html -->
      <div id="wrapper" class="toggled">
          <div id="sidebar-wrapper">
              <ul class="sidebar-nav">
                  <li class="sidebar-brand">
                      <a href="#">

                      </a>
                  </li>
                  <!--<li>
                      <a href="#menu1" class="collapsed" data-toggle="collapse" aria-expanded="false">Item 1<span class="fa fa-sort-desc"></span></a>
                      <div class="collapse" id="menu1">
                          <a href="#" class="submenu" data-parent="#menu1">Subitem 2</a>
                          <a href="#" class="submenu" data-parent="#menu1">Subitem 3</a>
                      </div>
                  </li>-->
                  <li><a href="{{route('profile')}}">Perfil</a></li>
                  <li><a href="#">Overview</a></li>
                  <li><a href="#">Events</a></li>
                  <li><a href="#">About</a></li>
                  <li><a href="#">Services</a></li>
                  <li id="last"><a href="{{route('logout')}}">Cerrar Sesión</a></li>
              </ul>
          </div>
          <div id="page-content-wrapper">
              <div class="container">
                  <h1 id="h1" class="text-center">Bienvenido {{session()->get('user')->username}}</h1>
                  @yield('page')
                <!--<p>Bienvenido /*session()->get('user')->username*/</p>
                  <a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>-->
              </div>
          </div>
      </div>
  @endsection
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

