@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
active treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('acteva')
active
@endsection
@section('actmenu4')
treeview
@endsection
@section ('contenido')
<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-tittle">Registrar Observación: </h3>
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

    <!-- FORMULARIO PARA AGREGAR OBSERVACION-->
  {{ Form::open(['route' =>'admin.observacionevaluacion.store'])}}
   {{Form::token()}}
  
           
      <input type="hidden" id="idestudio" name="idestudio" class="form-control" value="{{$idestudio}}" >
      <input type="hidden" id="idproyecto" name="idproyecto" class="form-control" value="{{$idproyecto}}" >

        <div class="col-md-12">
           <div class="form-group">
            <button type="submit" class="btn btn-success btn-block margin-bottom">Guardar Observación</button>
          </div>
        </div>
        <div class="col-md-12">
        <div class="form-group">
          <input class="form-control" id="asuntoobservacion" name="asuntoobservacion" placeholder="Asunto:" value="{{$asuntoobservacion}}">
        </div>
        </div>
        <div class="col-md-12"> 
        <div class="form-group">
          <textarea id="descripcionobservacion" name="descripcionobservacion" class="form-control" placeholder="Descripción:" style="height: 300px">
            {{$descripcionobservacion}}
          </textarea>
        </div>
        
        </div>

      
        {!!Form::close()!!}

      </div>


<div class="box-footer">

<!-- FORMULARIO PARA AGREGAR DOCUMENTOS A LA OBSERVACION-->
  

     {!!Form::model($idestudio,['route'=>['admin.observacionevaluacion.update',$idestudio],'method' =>'PUT','files'=>'true'])!!} 
       {{Form::token()}}
      <input type="hidden" id="asunto" name="asunto" class="form-control">
      <input type="hidden" id="descripcion" name="descripcion" class="form-control" >
       <div class="col-md-5">
        <div class="form-group">
          <label for="descripciondocumento">Descripción Documento</label>
          <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
         </div>
       </div>
      <div class="col-md-5">
         <div class="form-group">
          <label for="url">Subir Documento</label>
          <input type="file" name="documento" id="documento" class="form-control" placeholder="Seleccione Documento">
         </div>
       </div>
         <div class="col-md-2">
          <br>
          <div class="form-group">
        <button value="agregardocumento" name="agregardocumento" type="submit" class="btn btn-primary btn-block margin-bottom openagregardocumento">Agregar Documento</button>
      </div>
       </div>
     {!!Form::close()!!}

        <!-- Listar y opcion de eliminar documento  observacion-->
        <div class="col-md-12">
         <div class="form-group">
          <ul class="mailbox-attachments clearfix">
          @foreach($documentos as $doc)
          <li>
                  <a href="..{{$doc->urldocumentoobservacion}}" target="_blank"><span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span></a>
                  <div class="mailbox-attachment-info">
                    <a   class="mailbox-attachment-name">  {{$doc->desdocumentoobservacion}}</a>
                      </div> 
                      <a href="" data-target="#modal-delete-{{$doc->iddocumentoobservacion}}" data-toggle="modal" data-estudio="{{$idestudio}}" data-asuntoo="{{$asuntoobservacion}}" data-descripcion="{{$descripcionobservacion}}" class="openeliminar"><i class="fa  fa-trash-o"></i></a>
                       @include('admin.observacionevaluacion.modal')
                </li>
               
          @endforeach
          </ul>
        </div>
      </div>

       {{ Form::open(['route' =>'admin.evaluacion.store']) }}
        {{Form::token()}}
      <div class="col-md-12">
       <div class="form-group">
        <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$idestudio}}" >
        <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$idproyecto}}">
        <button type="submit" class="btn btn-danger btn-block margin-bottom">Cancelar</button>
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

$(document).on("click", ".openagregardocumento", function () {
var asunto = $('#asuntoobservacion').val();  
var descripcion = $('#descripcionobservacion').val(); 
$('#asunto').val(asunto);
$('#descripcion').val(descripcion);
});

$(document).on("click", ".openeliminardocumento", function () {

var asunto1 = $('#asuntoobservacion').val();  
var descripcion1 = $('#descripcionobservacion').val();
$('#asunto1').val(asunto1);
$('#descripcion1').val(descripcion1);
});

</script>

@endsection

