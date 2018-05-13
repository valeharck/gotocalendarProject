@auth
  Bienvenido {{session()->get('user')}}
  <a href="{{route('logout')}}">Salir</a>
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

