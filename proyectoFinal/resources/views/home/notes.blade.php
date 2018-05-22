@extends('home.home')


@section('page')
   <div class="container mt-5 mb-5">
       <div class="row col-md-offset-2">
           <div class="col col-6 col-md-6 offset-md-3 pt-3 pb-3">
               <div class="form-group" id="divAdd">
                   {!! Form::text('nota',null, ['class' => 'form-control', 'placeholder' => 'Nota', 'id' => 'addNota']) !!}
                   <button>Añadir</button>
               </div>
               @foreach($notes as $nota)
               <div class="form-group" id="divNotas">
                   {!! Form::text('nota',$nota->nota, ['class' => 'form-control', 'placeholder' => 'Nota', 'id' => 'nota']) !!}
                   <button id="check"><i class="fa fa-check"  style="color: green;"></i></button>
                   <button><i class="fa fa-times" style="color: red;"></i></button>
               </div>
               @endforeach
           </div>
       </div>
   </div>
@endsection