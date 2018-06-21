@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actdis')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Distrito: {{ $distrito->nombredistrito}}</h3>
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
              	{!!Form::model($distrito,['method'=>'PATCH','route'=>['distrito.update',$distrito->iddistrito]])!!}
              	{{Form::token()}}

                <div class="form-group">
                  <label for="codigo">Codigo</label>
                  <input type="text" name="codigo" value="{{$distrito->iddistrito}}" class="form-control" placeholder="Ingrese Codigo">
                </div>

                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$distrito->nombredistrito}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                
                <div class="form-group">
                  <label for="idprovincia">Provincia</label>
                  <select name="idprovincia" class="form-control">
                    @foreach ($provincias as $prov)
                      @if ($prov->idprovincia==$distrito->idprovincia)
                      <option value="{{$prov->idprovincia}}" selected>{{$prov->nombreprovincia}} </option>
                       @else 
                      <option value="{{$prov->idprovincia}}">{{$prov->nombreprovincia}} </option>
                       @endif

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