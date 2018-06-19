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
		<h3 class="box-tittle">Nueva Entidad</h3>
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
              	{!!Form::open(array('url'=>'admin/entidad','method'=>'POST','autocomplete'=>'off'))!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Ingrese Dirección">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Ingrese Teléfono">
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Ingrese Email">
                </div>

                 <div class="form-group">
                  <label for="ruc">RUC</label>
                  <input type="text" name="ruc" class="form-control" placeholder="Ingrese RUC">
                </div>
                <div class="form-group">
                  <label for="actividad">Actividad</label>
                  <select name="idactividad" class="form-control select2" data-placeholder="Selecione una Actividad">
                    @foreach ($actividades as $act)
                      <option value="{{$act->idactividad}}">{{$act->nombreactividad}} </option>
                    @endforeach
                  </select>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <button type="reset" class="btn btn-danger">Cancelar</button>
              </div>
				{!!Form::close()!!}
	          </div>
	</div>
	</div>
</div>
</section>

@endsection