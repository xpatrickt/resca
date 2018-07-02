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
    <h3 class="box-tittle">Registrar Certificacion del Estudio: </h3>
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

