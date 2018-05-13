@auth
  Bienvenido {{session()->get('user')}}
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

