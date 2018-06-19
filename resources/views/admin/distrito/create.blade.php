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
		<h3 class="box-tittle">Nuevo Distrito</h3>
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
              	{!!Form::open(array('url'=>'admin/distrito','method'=>'POST','autocomplete'=>'off'))!!}
              	{{Form::token()}}
                
                  <div class="form-group">
                  <label for="">Codigo</label>
                  <input type="text" name="codigo" class="form-control" placeholder="Ingrese Codigo">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                
                <div class="form-group">
                  <label for="provincia">Provincia</label>
                  <select name="idprovincia" class="form-control">
                    @foreach ($provincias as $prov)
                      <option value="{{$prov->idprovincia}}">{{$prov->nombreprovincia}} </option>
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