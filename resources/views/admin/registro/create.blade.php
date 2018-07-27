@extends('layouts.administrator')
@section('actmenu1')
active
@endsection
@section('actmenu2')
treeview
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
		<h3 class="box-tittle">Nuevo Registro de Estudio Ambiental</h3>
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
 

                 {{ Form::open(['route' => 'admin.registro.store','files'=>'true']) }}
              	{{Form::token()}}
                
                  <div class="col-md-9">
                <div class="form-group">
                <select class="form-control select2 dynamic" style="width: 100%;" name="idproyecto" id="idproyecto">
                  <option value="">Seleccione Proyecto</option>  
               @foreach($proyectos as $pro)
                 <option value="{{ $pro->idproyecto}}">{{ $pro->nombreproyecto}}</option>
               @endforeach
                </select>
                </div>

              </div>
              <div class="col-md-3">
                <div class="form-group">
      
                <a href="{{URL::action('ProyectoregistroController@create')}}"><button type="button" class="btn btn-primary">+ Nuevo Proyecto</button></a></h3>
                </div>
             
              </div>

                   <div class="box-body">
                  <div class="form-group">
                  <label for="">Nombre del Estudio</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción del Estudio</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="tiposestudio">Tipo de Estudio</label>
                  <select name="idtipoestudio" class="form-control">
                    @foreach ($tiposestudio as $test)
                      <option value="{{$test->idtipoestudio}}">{{$test->nombretipoestudio}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="documento">Subir Documento de Solicitud</label>
                  <input type="file" name="documentosolicitud" class="form-control" placeholder="Seleccione Documento Solicitud">
                </div>
          
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
              </div>
				{!!Form::close()!!}
	          </div>

	</div>
	</div>
</div>
</section>

@endsection

