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
                    <div class="panel-heading"><h4 class="panel-title text-center text-capitalize">Iniciar Sesión</h4></div>
                    <div class="panel-body pt-2 pb-2 pr-2-pl-2">
                        <span class="text-danger">{{ $errors->first('ko') }}</span>
                        {!! Form::open(['route' => 'entrar', 'method' => 'post']) !!}
                        {{csrf_field()}}
                        <div class="form-group row">
                            {!! Form::label('usuario','Usuario',['class' => ' col-form-label', 'placeholder' => 'Usuario']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('usuario'))
                                    {!! Form::text('usuario', null, ['class' => ' form-control border border-danger', 'placeholder' => 'Usuario']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('usuario', null, ['class' => 'form-control', 'placeholder' => 'Usuario']) !!}
                                @endif
                                    <span class="text-danger">{{ $errors->first('usuario') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('password','Contraseña',['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('password'))
                                    {!! Form::text('password', null, ['class' => ' form-control border border-danger', 'placeholder' => 'Password']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('password', null, ['class' => 'form-control', 'placeholder' => 'Contraseña']) !!}
                                @endif
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--<form class="form-singin">
        <img class="mb-4" src="https://getbootstrap.com/assets/brand/bootstrap-solid.svg" alt="" width="72" height="72">
        <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    </form>-->

@endsection
