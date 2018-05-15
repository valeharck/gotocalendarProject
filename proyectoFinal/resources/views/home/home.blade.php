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
          <!-- Sidebar -->
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
                  <li>
                      <a href="#">Shortcuts</a>
                  </li>
                  <li>
                      <a href="#">Overview</a>
                  </li>
                  <li>
                      <a href="#">Events</a>
                  </li>
                  <li>
                      <a href="#">About</a>
                  </li>
                  <li>
                      <a href="#">Services</a>
                  </li>
                  <li id="last">
                      <a href="{{route('logout')}}">Cerrar Sesión</a>
                  </li>
              </ul>
          </div>
          <!-- /#sidebar-wrapper -->

          <!-- Page Content -->
          <div id="page-content-wrapper">
              <div class="container-fluid">
                  <h1>Simple Sidebar</h1>
                  <p>Bienvenido {{session()->get('user')->username}}</p>
                  <!--<a href="#menu-toggle" class="btn btn-secondary" id="menu-toggle">Toggle Menu</a>-->
              </div>
          </div>
          <!-- /#page-content-wrapper -->
      </div>
      <!-- /#wrapper -->
      <!-- Menu Toggle Script -->
  @endsection
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

