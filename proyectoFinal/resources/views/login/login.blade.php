@extends('layout')
@extends('headers.headerHome')
@extends('footer.footer')

@section('css')
    <link href="{{ asset('css/login.css')}}" rel="stylesheet">
@endsection

@section('content')

    <div class="container mt-5 mb-5">
        <div class="row col-md-offset-2">
            <div class="col col-6 col-md-6 offset-md-3 pt-5 pb-5">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        @if($errors->has('invalid'))
                            <script>
                                swal('{{$errors->first('invalid')}}', {
                                    icon: "warning",
                                    buttons: false,
                                    timer: 3000,
                                });
                            </script>
                        @endif
                        <h4 class="panel-title text-center text-capitalize">Iniciar Sesión</h4>
                    </div>
                    <div class="panel-body pt-2 pb-2 pr-2-pl-2">
                        {!! Form::open(['route' => 'entrar', 'method' => 'post']) !!}
                        {{csrf_field()}}
                        <div class="form-group row">
                            {!! Form::label('email','Email',['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('email'))
                                    {!! Form::email('email', null, ['class' => ' form-control border border-danger', 'placeholder' => 'Email']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                @endif
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password','Contraseña',['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                            @if($errors->has('password'))
                                {{
                                   Form::macro('inputContra', function(){
                                       return '<input type="password" class="form-control border border-danger" placeholder="Contraseña" name="password" /><i class="oi oi-x" style="color: red"></i>';
                                   })
                               }}
                            @else
                                {{
                                    Form::macro('inputContra', function(){
                                        return '<input type="password" class="form-control" placeholder="Contraseña" name="password" />';
                                    })
                                }}
                            @endif
                            {!! Form::inputContra() !!}
                                <span class="text-danger">{{ $errors->first('password') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-10 mt-3">
                                {!! Form::submit('Iniciar Sesión' , ['class' => 'btn btn-dark']) !!}
                                {{
                                        Form::macro('botonCancelar', function(){
                                            return '<a role="button" class=" btn btn-dark" href="'.route('inicio').'">Cancelar</a>';
                                        })
                                    }}
                                {!! Form::botonCancelar() !!}
                                <span>No estas registrado? <a href="{{route('registro')}}">Registrate!</a></span>
                            </div>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
