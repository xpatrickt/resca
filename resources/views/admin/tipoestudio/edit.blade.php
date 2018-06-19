@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('acttes')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Tipo Estudio: {{ $tipoestudio->nombretipoestudio}}</h3>
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
              	{!!Form::model($tipoestudio,['method'=>'PATCH','route'=>['tipoestudio.update',$tipoestudio->idtipoestudio]])!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$tipoestudio->nombretipoestudio}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="siglas">Siglas</label>
                  <input type="text" name="siglas" value="{{$tipoestudio->siglastipoestudio}}" class="form-control" placeholder="Ingrese Siglas">
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