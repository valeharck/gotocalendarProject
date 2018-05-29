@extends('home.home')

@section('javascript')
    <script type="text/javascript" src="{{asset('js/recordatorio.js')}}" defer ></script>
@endsection

@section('page')
    <!-- modal -->
    <div class="modal" id="myModalRec">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Crear Recordatorio</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body ">
                    <div class="form-group">
                        {!! Form::label('titulo', 'Title', ['class' => 'col-md-2 col-form-label']) !!}
                        {!! Form::text('titulo',null, ['class' => 'col-md-8  form-control', 'placeholder' => 'Title', 'id' => 'titleRec']) !!}
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" id="butModalRec">añadir</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end modal -->
    <!-- second modal -->
    <div class="modal" id="modalU">
        <div class="modal-dialog">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Actualizar Recordatorio</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body ">
                    <div class="form-group">
                        {!! Form::label('titulo', 'Title', ['class' => 'col-md-2 col-form-label']) !!}
                        {!! Form::text('titulo',null, ['class' => 'col-md-8  form-control', 'placeholder' => 'Title', 'id' => 'titUpdt']) !!}
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark btn-sm" id="butModalRecUpdt">Actualizar</button>
                    <button type="button" class="btn btn-dark btn-sm" data-dismiss="modal">Cancelar</button>
                </div>

            </div>
        </div>
    </div>
    <!-- end second modal -->
    <div class="container mt-5 mb-5">
        <div class="row col-md-offset-2">
            <div class="col col-8 col-md-8 offset-md-2 pt-3 pb-3">
                <div class="mb-2">
                    <button class="btn btn-dark btn-sm" id="botonRec">Añadir Recordatorio</button>
                </div>
                <div id="accordion"></div>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var addRecd = '<?php echo e(route('setRecord')); ?>';
        var getInfoRec = '<?php echo e(route('getInfoRec')); ?>';
        var updRecord = '<?php echo e(route('updateRecord')); ?>';
        var anyadirTarea = '<?php echo e(route('addTarea')); ?>';
    </script>
@endsection