@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actpro')
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
		<h3 class="box-tittle">Editar Proyecto: {{ $proyecto->nombreproyecto}}</h3>
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
              	{!! Form::model($proyecto, ['route' => ['admin.proyecto.update', $proyecto->idproyecto],'method' => 'PUT']) !!}
              	{{Form::token()}}


                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$proyecto->nombreproyecto}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" value="{{$proyecto->descripcionproyecto}}" class="form-control" placeholder="Ingrese Descripción">
                </div>

                 <div class="form-group">
                  <label for="objetivo">Objetivo del Proyecto</label>
                  <input type="text" name="objetivo" value="{{$proyecto->objetivoproyecto}}" class="form-control" placeholder="Ingrese Ubicación">
                </div>

                <div class="form-group">
                  <label for="beneficiarios">Beneficiarios</label>
                  <input type="text" name="beneficiarios" value="{{$proyecto->beneficiariosproyecto}}" class="form-control" placeholder="Ingrese Numero de Beneficiarios del Proyecto">
                </div>
                

                <div class="form-group">
                  <label for="entidad">Entidad</label>
                  <select name="identidad" class="form-control">
                    @foreach ($entidades as $ent)
                      @if ($ent->identidad==$proyecto->identidad)
                      <option value="{{$ent->identidad}}" selected>{{$ent->nombreentidad}} </option>
                       @else 
                      <option value="{{$ent->identidad}}">{{$ent->nombreentidad}} </option>
                       @endif

                    @endforeach
                  </select>
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

