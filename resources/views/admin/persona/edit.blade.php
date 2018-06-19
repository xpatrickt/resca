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
		<h3 class="box-tittle">Editar Persona: {{ $persona->nombrepersona}}</h3>
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
              	{!!Form::model($persona,['method'=>'PATCH','route'=>['persona.update',$persona->idpersona]])!!}
              	{{Form::token()}}

                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$persona->nombrepersona}}" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="apellidos">Apellidos</label>
                  <input type="text" name="apellidos" value="{{$persona->apellidospersona}}" class="form-control" placeholder="Ingrese Apellidos">
                </div>
                <div class="form-group">
                  <label for="dni">DNI</label>
                  <input type="text" name="dni" value="{{$persona->dnipersona}}" class="form-control" placeholder="Ingrese DNI">
                </div>
                <div class="form-group">
                  <label for="telefono">Teléfono</label>
                  <input type="text" name="telefono" value="{{$persona->telefonopersona}}" class="form-control" placeholder="Ingrese Teléfono">
                </div>
                 <div class="form-group">
                  <label for="direccion">Dirección</label>
                  <input type="text" name="direccion" value="{{$persona->direccionpersona}}" class="form-control" placeholder="Ingrese Dirección">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" name="email" value="{{$persona->emailpersona}}" class="form-control" placeholder="Ingrese Email">
                </div>   
                <div class="form-group">
                  <label for="idcargo">Cargo</label>
                  <select name="idcargo" class="form-control">
                    @foreach ($cargos as $car)
                      @if ($car->idcargo==$persona->idcargo)
                      <option value="{{$car->idcargo}}" selected>{{$car->nombrecargo}} </option>
                       @else 
                      <option value="{{$car->idcargo}}">{{$car->nombrecargo}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="identidad">Entidad</label>
                  <select name="identidad" class="form-control">
                    @foreach ($entidades as $ent)
                      @if ($ent->identidad==$persona->identidad)
                      <option value="{{$ent->identidad}}" selected>{{$ent->nombreentidad}} </option>
                       @else 
                      <option value="{{$ent->identidad}}">{{$ent->nombreentidad}} </option>
                       @endif

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