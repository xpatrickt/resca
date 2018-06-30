@extends('layouts.administrator')
@section('actmenu2')
active treeview
@endsection
@section('acteva')
active
@endsection
@section('treemenu')
treeview
@endsection
@section ('contenido')

<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
   <div class="box-header with-border">
  <h3 class="box-tittle">Observación</h3>
  <h4 class="box-tittle">Estudio: {{$estudio->nombreestudio}}</h4>
  @if(count($errors)>0)
  <div class="alert alert-danger">
   <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
     @endforeach
    </ul>
    </div>
    @endif
    </div>
      <div class="box-body">
    {{ Form::open(['route' =>'admin.observacionevaluacion.store']) }}
   {{Form::token()}}
           
      <input type="hidden" id="idestudio" name="idestudio" class="form-control" value="{{$estudio->idestudio}}" >
      <input type="hidden" id="idproyecto" name="idproyecto" class="form-control" value="{{$proyecto->idproyecto}}" >
        @if($idobservacion=="" or $idobservacion==null)
         <input type="hidden" id="idobservacion" name="idobservacion" class="form-control" value="">
         @else
         <input type="hidden" id="idobservacion" name="idobservacion" class="form-control" value="{{$idobservacion}}" >
        @endif

        <div class="form-group">
          @if($asuntoobservacion==null)
          <input class="form-control" id="asuntoobservacion" name="asuntoobservacion" placeholder="Asunto:">
          @else
          <input class="form-control" id="asuntoobservacion" name="asuntoobservacion" placeholder="Asunto:" value="{{$asuntoobservacion}}" readonly="readonly">
          @endif
        </div>
        <div class="form-group">
          @if($descripcionobservacion==null)
          <textarea id="descripcionobservacion" name="descripcionobservacion" class="form-control" style="height: 300px">
          </textarea>
          @else
          <textarea id="descripcionobservacion" name="descripcionobservacion" class="form-control" style="height: 300px" disabled>
            {{$descripcionobservacion}}
          </textarea>
          @endif
        </div>
         <div class="box-footer">
         </div>

        @if($asuntoobservacion==null)
        <div class="col-md-1">
            <button type="submit" class="btn btn-primary">&nbspAgregar&nbsp</button>
         </div>
        @endif
        {!!Form::close()!!}


         @if($asuntoobservacion==null)
            {{ Form::open(['route' =>'admin.evaluacion.store']) }}
           {{Form::token()}}
           <div class="col-md-1">
           <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio->idestudio}}" >
           <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto->idproyecto}}" >
           <input type="hidden" id="observacion" name="observacion" class="form-control" value="{{$idobservacion}}" >
           <button type="submit" class="btn btn-danger">Cancelar</button>
           </div>
            {!!Form::close()!!}
           @endif
     

    
     @if($asuntoobservacion!=null)
     {{ Form::open(['route' =>'admin.evaluacion.store']) }}
      {{Form::token()}}
      <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio->idestudio}}" >
      <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto->idproyecto}}" >
      <input type="hidden" id="observacion" name="observacion" class="form-control" value="{{$idobservacion}}" >

        <div class="box-footer">
           <!--
            <a href="" class="btn btn-primary" data-target="#modal-documentoobservacion-{{$idobservacion}}"  data-toggle="modal">Agregar Documento</a>
          -->
            <button type="submit" class="btn btn-danger">Aceptar</button>
        </div>
        {!!Form::close()!!}
        @endif
    
     @include('admin.observacionevaluacion.modaldocumentoobservacion')
        </div>


      </div>
  </div>
  </div>
</div>
</section>
  

@endsection


@section('script')
<script>


$(document).ready(function(){

});
</script>

@endsection