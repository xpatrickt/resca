@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actprov')
active
@endsection

@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Provincia: {{ $provincia->nombreprovincia}}</h3>
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
              	{!!Form::model($provincia,['method'=>'PATCH','route'=>['provincia.update',$provincia->idprovincia]])!!}
              	{{Form::token()}}

                <div class="form-group">
                  <label for="codigo">Codigo</label>
                  <input type="text" name="codigo" value="{{$provincia->idprovincia}}" class="form-control" placeholder="Ingrese Codigo">
                </div>

                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$provincia->nombreprovincia}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                
                <div class="form-group">
                  <label for="iddepartamento">Departamento</label>
                  <select name="iddepartamento" class="form-control">
                    @foreach ($departamentos as $dep)
                      @if ($dep->iddepartamento==$provincia->iddepartamento)
                      <option value="{{$dep->iddepartamento}}" selected>{{$dep->nombredepartamento}} </option>
                       @else 
                      <option value="{{$dep->iddepartamento}}">{{$dep->nombredepartamento}} </option>
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