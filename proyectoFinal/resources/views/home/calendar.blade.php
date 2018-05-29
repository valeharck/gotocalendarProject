@extends('home.home')

@section('javascript')
    <style type="text/css">
        table{
            border: 1px solid black;
        }
    </style>
    <script type="text/javascript" src="{{asset('js/calendar.js')}}" defer ></script>
    <script type="text/javascript" src="{{asset('js/fullcalendar-3.9.0/lib/moment.min.js')}}" defer></script>
    <script type="text/javascript" src="{{asset('js/fullcalendar-3.9.0/fullcalendar.js')}}" defer></script>
    <script type="text/javascript" src='{{asset('js/fullcalendar-3.9.0/locale/es.js')}}' defer></script>
@endsection
@section('page')
    <div class="container mt-5 mb-5">
        <div id="calendar"></div>
    </div>
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Crear Evento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body ">
                    <div class="form-group">
                        {!! Form::label('title', 'Title', ['class' => 'col-md-2 col-form-label']) !!}
                        {!! Form::text('title',null, ['class' => 'col-md-8  form-control', 'placeholder' => 'Title', 'id' => 'titleEvent']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha', 'Fecha Inicio', ['class' => 'col-md-2 col-form-label']) !!}
                        {{
                         Form::macro('inputDate', function(){
                            return '<input type="datetime-local" class="form-control col-md-8" placeholder="Fecha de Inicio" name="fecha" id="fecha_ini" />';
                         })
                        }}
                        {!! Form::inputDate() !!}
                    </div>
                    <div class="form-group" id="fecha_final">
                        {!! Form::label('fecha', 'Fecha Final', ['class' => 'col-md-2 col-form-label' , 'id' => 'fecha_fin_label']) !!}
                        {{
                         Form::macro('inputDate', function(){
                            return '<input type="datetime-local" class="form-control col-md-8" placeholder="Fecha de finalizacion" name="fecha" id="fecha_fin" />';
                         })
                        }}
                        {!! Form::inputDate() !!}
                    </div>
                    <div class="form-control">
                        <label class="form-check-label" for="allDay">Dura solo un dia dia?</label>
                        <input type="checkbox" class="form-check-input col-md-4 col-form-label" id="allDay">
                    </div>

                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" id="butModal">añadir</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <div class="modal" id="myModal2">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Evento</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body" id="modal-body">
                    <div class="form-group" style="display: none">
                        {!! Form::text('title2',null, ['class' => 'col-md-8  form-control', 'id' => 'idEvent']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('title2', 'Title', ['class' => 'col-md-2 col-form-label']) !!}
                        {!! Form::text('title2',null, ['class' => 'col-md-8  form-control', 'placeholder' => 'Title', 'id' => 'titleEvent_act']) !!}
                    </div>
                    <div class="form-group">
                        {!! Form::label('fecha', 'Fecha Inicio', ['class' => 'col-md-2 col-form-label']) !!}
                        {{
                         Form::macro('inputDate', function(){
                            return '<input type="datetime-local" class="form-control col-md-8" placeholder="Fecha de Inicio" name="fecha" id="fecha_ini_act" />';
                         })
                        }}
                        {!! Form::inputDate() !!}
                    </div>
                    <div class="form-group" id="fecha_final">
                        {!! Form::label('fecha', 'Fecha Final', ['class' => 'col-md-2 col-form-label' , 'id' => 'fecha_fin_label']) !!}
                        {{
                         Form::macro('inputDate', function(){
                            return '<input type="datetime-local" class="form-control col-md-8" placeholder="Fecha de finalizacion" name="fecha" id="fecha_fin_act" />';
                         })
                        }}
                        {!! Form::inputDate() !!}
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal" id="deleteEvent">Eliminar Evento</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal" id="actulizarEvent">actualizar</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <script type="text/javascript">
        var addEvento = '<?php echo e(route('setEvent')); ?>';
        var info = '<?php echo e(route('calendarInfo')); ?>';
        var actualizarEv = '<?php echo e(route('updateEvento')); ?>';
    </script>
@endsection