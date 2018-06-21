@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actcat')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Catálogo: {{ $catalogo->nombrecatalogo}}</h3>
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
              	{!!Form::model($catalogo,['method'=>'PATCH','route'=>['catalogo.update',$catalogo->idcatalogo]])!!}
              	{{Form::token()}}
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$catalogo->nombrecatalogo}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" value="{{$catalogo->descripcioncatalogo}}" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="idactividad">Actividad</label>
                  <select name="idactividad" class="form-control">
                    @foreach ($actividades as $act)
                      @if ($act->idactividad==$catalogo->idactividad)
                      <option value="{{$act->idactividad}}" selected>{{$act->nombreactividad}} </option>
                       @else 
                      <option value="{{$act->idactividad}}">{{$act->nombreactividad}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                 <button type="{{ url()->previous() }}" class="btn btn-danger">Cancelar</button>
              </div>
				{!!Form::close()!!}
	          </div>
	</div>
	</div>
</div>
</section>

@endsection