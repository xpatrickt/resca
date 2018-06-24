@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actgusu')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Usuario: {{ $user->name}}</h3>
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
              	{!! Form::model($user, ['route' => ['admin.user.update', $user->id],'method' => 'PUT']) !!}
              	{{Form::token()}}

          <div class="form-group">
                  <label for="nombre">Nombre de Usuario</label>
                  <input type="text" name="nombre" value="{{$user->name}}" class="form-control" placeholder="Ingrese Nombre de usuario" required>
                </div>

                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="text" name="email" value="{{$user->email}}" class="form-control" placeholder="Ingrese Email" required>
                </div>
                <div class="form-group">
                  <label for="password">Nuevo Password</label>
                  <input type="password" name="password" class="form-control" placeholder="Ingrese Password" required>
                </div>
                <div class="form-group">
                  <label for="persona">Persona</label>
                  <select name="persona" class="form-control">
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
                  <label for="provilegios">Privilegios de usuario</label>
                  <select name="provilegios" class="form-control">
                    @foreach ($cargos as $car)
                      @if ($car->idcargo==$persona->idcargo)
                      <option value="{{$car->idcargo}}" selected>{{$car->nombrecargo}} </option>
                       @else 
                      <option value="{{$car->idcargo}}">{{$car->nombrecargo}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>
        
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