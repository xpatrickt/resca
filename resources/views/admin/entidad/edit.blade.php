@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actent')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Entidad: {{$entidad->nombreentidad}}</h3>
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
              	{!!Form::model($entidad,['method'=>'PATCH','route'=>['entidad.update',$entidad->identidad]])!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$entidad->nombreentidad}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" value="{{$entidad->direccionentidad}}" class="form-control" placeholder="Ingrese Dirección">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" name="telefono" value="{{$entidad->telefonoentidad}}" class="form-control" placeholder="Ingrese Teléfono">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" value="{{$entidad->emailentidad}}" class="form-control" placeholder="Ingrese Email">
                </div>
                 <div class="form-group">
                  <label for="ruc">RUC</label>
                  <input type="text" name="ruc" value="{{$entidad->rucentidad}}" class="form-control" placeholder="Ingrese RUC">
                </div>
                <div class="form-group">
                  <label for="idactividad">Actividad</label>
                  <select name="idactividad" class="form-control select2">
                    @foreach ($actividades as $act)
                      @if ($act->idactividad==$entidad->idactividad)
                      <option value="{{$act->idactividad}}" selected>{{$act->nombreactividad}} </option>
                       @else 
                      <option value="{{$act->idactividad}}">{{$act->nombreactividad}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>                               
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <a href="{{ url('admin/entidad') }}" class="btn btn-danger">Cancelar</a>
              </div>
				{!!Form::close()!!}
	          </div>
	</div>
	</div>
</div>
</section>

@endsection