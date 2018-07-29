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
@section('acttes')
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
		<h3 class="box-tittle">Nuevo Tipo de Estudio</h3>
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
              	{{ Form::open(['route' => 'admin.tipoestudio.store']) }}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="siglas">Siglas</label>
                  <input type="text" name="siglas" class="form-control" placeholder="Ingrese Siglas">
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