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

@section('actmenu4')
treeview
@endsection

@section ('contenido')

<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Cambiar Contraseña: {{ $user->name}}</h3>
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
              	{!! Form::model($user, ['route' => ['admin.detalleusuario.update', $user->id],'method' => 'PUT']) !!}
              	{{Form::token()}}

                <div class="form-group">
                  <label for="password">Ingrese Nueva Contraseña</label>
                  <input id="password" type="password" name="password" class="form-control" placeholder="Ingrese Password" required>
                </div>
                <div class="form-group">
                  <label for="password">Confirme Nueva Contraseña</label>
                  <input id="password" type="password" name="password_confirmation" class="form-control" placeholder="Ingrese Password" required>
                </div>

                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ url('admin/detalleusuario') }}" class="btn btn-danger">Cancelar</a>
              </div>
				{!!Form::close()!!}
	          </div>
	</div>
	</div>
</div>
</section>

@endsection