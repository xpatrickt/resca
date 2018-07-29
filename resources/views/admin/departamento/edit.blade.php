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
@section('actdep')
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
		<h3 class="box-tittle">Editar Departamento: {{ $departamento->nombredepartamento}}</h3>
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
              	{!! Form::model($departamento, ['route' => ['admin.departamento.update', $departamento->iddepartamento],'method' => 'PUT']) !!}
              	{{Form::token()}}

              	<div class="form-group">
                  <label for="codigo">Codigo</label>
                  <input type="text" name="codigo" value="{{$departamento->iddepartamento}}" class="form-control" placeholder="Ingrese Codigo">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$departamento->nombredepartamento}}" class="form-control" placeholder="Ingrese Nombre">
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