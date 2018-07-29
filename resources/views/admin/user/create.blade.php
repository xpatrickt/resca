@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actgusu')
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
		<h3 class="box-tittle">Nuevo Usuario</h3>
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
              	{{ Form::open(['route' => 'admin.user.store']) }}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre de Usuario</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre de usuario" required>
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" class="form-control" placeholder="Ingrese Email" required>
                </div>
                <div class="form-group">
                  <label for="password">Ingrese Password</label>
                  <input id="password" type="password" name="password" class="form-control" placeholder="Ingrese Password" required>
                </div>
                <div class="form-group">
                  <label for="password">Confirme Password</label>
                  <input id="password" type="password" name="password_confirmation" class="form-control" placeholder="Ingrese Password" required>
                </div>
                <div class="form-group">
                  <label for="persona">Persona</label>
                  <select name="idpersona" class="form-control select2">
                    @foreach ($personas as $per)
                      <option value="{{$per->idpersona}}">{{$per->nombres}} </option>
                    @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="privilegios">Privilegios de usuario</label>
                  <select name="idrol" class="form-control">
                    @foreach ($roles as $rol)
                      <option value="{{$rol->id}}">{{$rol->name}} </option>
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