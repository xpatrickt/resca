@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('actmenu3')
active 
@endsection
@section('treemenu')
treeview
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
    <h4>Respuesta Observación: {{$observacion->asuntoobservacion}}</h4>
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
    {!!Form::model($observacion,['route'=>['admin.seguimiento.update1',$observacion->idobservacion],'method'=>'PUT','files'=>'true'])!!} 
     {{Form::token()}}
       <div class="box-body">
          <input type="hidden" id="estudioresp" name="estudioresp" class="form-control" value="{{$idestudio}}" >
          <input type="hidden" id="proyectoresp" name="proyectoresp" class="form-control" value="{{$idproyecto}}" >
       
          <div class="form-group">
             <input id="asuntorespuesta" name="asuntorespuesta" class="form-control" placeholder="Asunto:">
          </div>
          <div class="form-group">
              <textarea id="descripcionrespuesta" name="descripcionrespuesta" class="form-control" placeholder="Descripción:" style="height: 200px">
              </textarea>
          </div>
          <div class="form-group">
            <label for="descripciondocumento">Descripción Documento</label>
            <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
          </div>
          <div class="form-group">
           <label for="tipodocumento">Tipo Documento</label>
            <select name="tipodocumento" id="tipodocumento" class="form-control dynamic">
              <option value="">Seleccione Tipo</option>  
              @foreach($tipodocumento as $doc)
              <option value="{{ $doc->iddocumento}}">{{ $doc->nombredocumento}}</option>
              @endforeach
             </select>
          </div>
          <div class="form-group">
             <label for="documento">Subir Documento</label>
             <input type="file" name="documento" id="documento" class="form-control" placeholder="Seleccione Documento">
         </div>
    </div>
    <div class="box-footer">
          <div class="col-md-6">
          <button type="submit" class="btn btn-primary btn-block margin-bottom">guardar</button>
        </div>
 {{Form::Close()}}    

{{ Form::open(['route' =>'admin.seguimiento.store']) }}
        {{Form::token()}}
      <div class="col-md-6">
       <div class="form-group">
        <input type="hidden" id="estudio" name="estudio" class="form-control" value="{{$idestudio}}" >
        <input type="hidden" id="proyecto" name="proyecto" class="form-control" value="{{$idproyecto}}">
        <button type="submit" class="btn btn-danger btn-block margin-bottom">Cancelar</button>
        </div>
        </div>
       {!!Form::close()!!}
     
       </div>
    </div>
  </div>
</div>
  </section>
  @endsection