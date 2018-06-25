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
        <div class="form-group">
          @if($asuntoobservacion==null)
          <input class="form-control" id="asuntoobservacion" name="asuntoobservacion" placeholder="Asunto:">
          @else
          <input class="form-control" id="asuntoobservacion" name="asuntoobservacion" placeholder="Asunto:" value="{{$asuntoobservacion}}" disabled>
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
            @if($asuntoobservacion==null)
            <button type="submit" class="btn btn-primary">Agregar</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
            @else
            <button type="submit" class="btn btn-primary">Agregar Documento</button>
            <a href="{{ url()->previous() }}" class="btn btn-danger">Aceptar</a>
            @endif
            
        </div>
     {!!Form::close()!!}
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