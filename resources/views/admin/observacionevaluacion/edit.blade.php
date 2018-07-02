@extends('layouts.administrator')
@section('actmenu2')
active treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actcer')
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

  {{ Form::open(['route' =>'admin.observacionevaluacion.store']) }}
   {{Form::token()}}
           
      <input type="hidden" id="idestudio" name="idestudio" class="form-control" value="{{$estudio}}" >
      <input type="hidden" id="idproyecto" name="idproyecto" class="form-control" value="{{$proyecto}}" >


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
          <ul class="mailbox-attachments clearfix">
          @foreach($documentos as $doc)
          <li>
                  <a href="..{{$doc->urldocumentoobservacion}}" target="_blank"><span class="mailbox-attachment-icon"><i class="fa fa-file-pdf-o"></i></span></a>

                  <div class="mailbox-attachment-info">
                    <a   class="mailbox-attachment-name">  {{$doc->desdocumentoobservacion}}</a>
                      </div> 

                      <!--href="" data-target="#modal-delete-{{$doc->iddocumentoobservacion}}" data-toggle="modal"  <i class="fa  fa-trash-o"></i>-->
                </li>
          @endforeach
          </ul>
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
           <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio}}" >
           <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto}}">
           <button type="submit" class="btn btn-danger">Cancelar</button>
           </div>
            {!!Form::close()!!}
           @endif
     

    
     @if($asuntoobservacion!=null)
     {{ Form::open(['route' =>'admin.evaluacion.store']) }}
      {{Form::token()}}
      <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$estudio}}" >
      <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$proyecto}}" >
      <input type="hidden" id="observacion" name="observacion" class="form-control" value="{{$idobservacion}}" >

        <div class="box-footer">
          <button type="submit" class="btn btn-danger">Aceptar</button>
           {!!Form::close()!!}
          <a href="" class="btn btn-primary" data-target="#modal-documento-{{$idobservacion}}" data-idestudio="{{$estudio}}" data-nombreestudio="{{$nombreestudio}}" data-proyecto="{{$proyecto}}" data-asunto="{{$asuntoobservacion}}" data-descripcion="$descripcionobservacion" data-toggle="modal">Agregar Documento</a>
              @include('admin.observacionevaluacion.modaldocumentoobservacion')
           
            
        </div>
       
        @endif


            <!-- FORMULARIO PARA AGREGAR DOCUMENTOS A LA OBSERVACION-->

                {!! Form::model($estudio, ['route' => ['admin.certificacion.update', $estudio->idestudio],'method' => 'PUT','files'=>'true']) !!}                
              
                 {{Form::token()}}           
                <div class="form-group">

                  <label for="nombree">Nombre</label>
                  <input type="text" name="nombree" value="{{$estudio->nombreestudio}}" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre de Resolución</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre de Resolución">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>

                <div class="form-group">
                  <label for="fecha">Fecha de Resolución</label>
                  <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input type="text" class="form-control pull-right" id="datepicker" name="fecha">
                </div>
                </div>

                <div class="form-group">
                  <label for="documento">Subir Documento de Resolución</label>
                  <input type="file" name="documento" class="form-control" placeholder="Seleccione Resolución">
                </div>
                                                
                <div class="form-group">
                  <input type="hidden" name="idestado" value="8" />
                </div>              
                 <div class="form-group">
                  <input type="hidden" name="idestudio" value="{{$estudio->idestudio}}" class="form-control" placeholder="">
                </div>   
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
              </div>
              {{ csrf_field() }} 
        {!!Form::close()!!}
            </div>
  </div>
  </div>
</div>
</section>

@endsection

