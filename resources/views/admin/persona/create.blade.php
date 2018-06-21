@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actper')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Nueva Persona</h3>
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
              	{!!Form::open(array('url'=>'admin/persona','method'=>'POST','autocomplete'=>'off'))!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" name="apellidos" class="form-control" placeholder="Ingrese Apellidos">
                </div>
                <div class="form-group">
                  <label for="dni">DNI</label>
                  <input type="text" name="dni" class="form-control" placeholder="Ingrese DNI">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" name="telefono" class="form-control" placeholder="Ingrese Teléfono">
                </div>
                 <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" class="form-control" placeholder="Ingrese Dirección">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" class="form-control" placeholder="Ingrese Email">
                </div>
                <div class="form-group">
                  <label for="cargo">Cargo</label>
                  <select name="idcargo" class="form-control">
                    @foreach ($cargos as $car)
                      <option value="{{$car->idcargo}}">{{$car->nombrecargo}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="entidad">Entidad</label>
                  <select name="identidad" class="form-control">
                    @foreach ($entidades as $ent)
                      <option value="{{$ent->identidad}}">{{$ent->nombreentidad}} </option>
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