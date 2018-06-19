@extends('layouts.administrator')

@section('treemenu')
active treeview
@endsection
@section('actinst')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Instrumento de Gestión: {{ $instrumento->nombreinstrumentog}}</h3>
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
              	{!!Form::model($instrumento,['method'=>'PATCH','route'=>['instrumento.update',$instrumento->idinstrumentog]])!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$instrumento->nombreinstrumentog}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="siglas">Siglas</label>
                  <input type="text" name="siglas" value="{{$instrumento->siglasinstrumentog}}" class="form-control" placeholder="Ingrese Siglas">
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