@auth
Bienvenido
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";
    </script>
@endauth

