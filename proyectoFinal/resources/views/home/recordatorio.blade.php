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
    <div class="container mt-5 mb-5">
        <div class="row col-md-offset-2">
            <div class="col col-8 col-md-8 offset-md-2 pt-3 pb-3">
                <div class="mb-2">
                    <button class="btn btn-dark btn-sm" id="botonRec">Añadir Recordatorio</button>
                </div>
                <div id="accordion">
                    <div class="card">
                        <div class="card-header" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    Recordatorio #1
                                </button>
                            </h5>
                        </div>

                        <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <li>hola <span class="fa fa-check" style="float: right;color: green"></span></li>
                                <li>hola </li>
                                <li>hola </li>
                                <li>hola </li>
                                <li>hola </li>
                                <li>hola </li>
                                <li>hola </li>
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Collapsible Group Item #2
                                </button>
                            </h5>
                        </div>
                        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                    <div class="card">
                        <div class="card-header" id="headingThree">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Collapsible Group Item #3
                                </button>
                            </h5>
                        </div>
                        <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                            <div class="card-body">
                                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        var addRecd = '<?php echo e(route('setRecord')); ?>';
    </script>
@endsection