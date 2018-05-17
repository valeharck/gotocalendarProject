@extends('home.home')

@section('page')

    <div  class="container mt-5 mb-5">
        <div  class="row col-md-offset-2">
            <div  class="col col-6 col-md-6 offset-md-3 pt-3 pb-3">
                <div class="panel panel-default">
                    <div class="panel-body pt-2 pb-2 pr-2 pl-2" id="registro">
                        @foreach($user as $item)
                        {!! Form::open(['route' => 'send', 'method' => 'post']) !!}
                        {{csrf_field()}}
                        <div class="form-group row has-feedback">
                            {!! Form::label('nombre', 'Nombre', ['class' =>'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('nombre'))
                                    {!! Form::text('nombre', $item->nombre, ['class' => 'form-control border border-danger', 'placeholder' => 'Nombre']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('nombre', $item->nombre , ['class' => 'form-control', 'placeholder' => 'Nombre']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('nombre') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('apellidos', 'Apellidos', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('apellidos'))
                                    {!! Form::text('apellidos', $item->apellidos, ['class' => 'form-control border border-danger', 'placeholder' => 'Apellidos']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('apellidos', $item->apellidos, ['class' => 'form-control', 'placeholder' => 'Apellidos']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('apellidos') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('fecha_nacimiento', 'Fecha Nacimiento', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('fecha_nacimiento'))
                                    {!! Form::date('fecha_nacimiento', $item->fecha_nacimiento, ['class' => 'form-control border border-danger', 'placeholder' => 'Fecha Nacimiento']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::date('fecha_nacimiento', $item->fecha_nacimiento, ['class' => 'form-control', 'placeholder' => 'Fecha Nacimiento']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('fecha_nacimiento') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('email', 'Email', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('email'))
                                    {!! Form::email('email', $item->email, ['class' => 'form-control border border-danger', 'placeholder' => 'Email']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::email('email', $item->email, ['class' => 'form-control', 'placeholder' => 'Email']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('username', 'Usuario', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('username'))
                                    {!! Form::text('username', $item->username, ['class' => 'form-control border border-danger', 'placeholder' => 'Usuario']) !!}
                                    <i class="oi oi-x" style="color: red"></i>
                                @else
                                    {!! Form::text('username', $item->username, ['class' => 'form-control', 'placeholder' => 'Usuario']) !!}
                                @endif
                                <span class="text-danger">{{ $errors->first('email') }}</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            {!! Form::label('contrasenya', 'Contraseña', ['class' => 'col-sm-2 col-form-label']) !!}
                            <div class="col-sm-10">
                                @if($errors->has('contrasenya'))
                                    {!!
                                        Form::macro('inputContra', function(){
                                           return '<input type="password" class="form-control border border-danger" placeholder="Contraseña" name="contrasenya"  /><i class="oi oi-x" style="color: red"></i>';
                                       })
                                   !!}
                                @else
                                    {!!
                                        Form::macro('inputContra', function(){
                                            return '<input type="text" class="form-control" placeholder="Contraseña" name="contrasenya" value="' . $item->password . '" />';
                                        })
                                    !!}
                                @endif
                                {!! Form::inputContra() !!}
                                <span class="text-danger">{{ $errors->first('contrasenya') }}</span>
                            </div>
                        </div>
                        <div class="form-group row ">
                            <div class="col-sm-10 mt-3 ">
                                {!! Form::submit('Actualizar', ['class' => 'btn btn-dark ']) !!}
                            </div>
                        </div>
                        {!! Form::close() !!}
                            @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection