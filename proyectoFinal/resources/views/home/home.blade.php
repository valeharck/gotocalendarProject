@auth
Bienvenido
@else
    <script type="text/javascript">
        window.location = "{{route('inicio')}}";//here double curly bracket
    </script>
@endauth

