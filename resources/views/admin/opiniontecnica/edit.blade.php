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
    <h4>Opinión Técnica:</h4>
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
    {!!Form::model($idestudio,['route'=>['admin.opiniontecnica.update',$idestudio],'method'=>'PUT','files'=>'true'])!!} 
     {{Form::token()}}
       <div class="box-body">
          <input type="hidden" id="estudioresp" name="estudioresp" class="form-control" value="{{$idestudio}}" >
          <input type="hidden" id="proyectoresp" name="proyectoresp" class="form-control" value="{{$idproyecto}}" >
       
          <div class="form-group">
             <input id="descripcion" name="descripcion" class="form-control" placeholder="Descripción:">
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

{{ Form::open(['route' =>'admin.evaluacion.store']) }}
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