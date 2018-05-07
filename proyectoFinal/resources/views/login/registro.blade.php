@extends('layout')
@extends('headers.headerHome')
@extends('footer.footer')

@section('css')
    <link  type="text/css" href="{{ asset('css/registro.css')}}" rel="stylesheet">
    <link type="text/css" href="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.css')}} " rel="Stylesheet" />
@endsection

@section('javascript')

    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1.custom/external/jquery/jquery.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/jquery-ui-1.12.1.custom/jquery-ui.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/registro.js')}}" defer ></script>
@endsection

@section('content')
    <div  class="container mt-5 mb-5">
        <div  class="row col-md-offset-2">
            <div  class="col col-6 col-md-6 offset-md-3 pt-5 pb-5">
                <div class="panel panel-default">
                    <div class="panel-heading" id="panelh"><h4 class="panel-title text-center text-capitalize">Registro</h4></div>
                    <div class="panel-body pt-2 pb-2 pr-2 pl-2" id="registro">

                            {!! Form::open(['route' => 'send', 'method' => 'post']) !!}
                            {{csrf_field()}}
                            <div class="form-group row">
                                {!! Form::label('nombre', 'Nombre', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('nombre', null, ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('apellidos', null, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::date('fecha_nacimiento', null, ['class' => 'form-control', 'placeholder' => 'Fecha Nacimiento']) !!}
                                    <small id="errorDate"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                    <small id="errorEmail"></small>
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('username', 'Usuario', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {!! Form::text('username', null, ['class' => 'form-control', 'placeholder' => 'Usuario']) !!}
                                </div>
                            </div>
                            <div class="form-group row">
                                {!! Form::label('contrasenya', 'Contraseña', ['class' => 'col-sm-2 col-form-label']) !!}
                                <div class="col-sm-10">
                                    {{Form::macro('inputContra', function()
                                    {
                                    return '<input type="password" class="form-control" placeholder="Contraseña" name="contrasenya" />';
                                    })}}
                                    {!! Form::inputContra() !!}
                                    <small id="errorpwd"></small>
                                </div>
                            </div>
                            <div class="form-group row ">
                                <div class="col-sm-10 mt-3 ">
                                    {!! Form::submit('Registrarse', ['class' => 'btn btn-dark ']) !!}
                                    {{Form::macro('botonCancelar', function()
                                    {
                                    return '<a role="button" class=" btn btn-dark" href="'.route('inicio').'">Cancelar</a>';
                                    })}}
                                    {!! Form::botonCancelar() !!}
                                </div>
                            </div>
                            {!! Form::close() !!}

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
