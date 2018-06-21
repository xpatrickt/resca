@extends('layouts.administrator')
@section ('contenido')
<section class="content">
<div class="row">
	<div class="col-md-12">
	<div class="box box-primary">
		<div class="box-header with-border">
		<h3 class="box-tittle">Editar Proyecto: {{ $proyecto->nombreproyecto}}</h3>
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
              	{!!Form::model($proyecto,['method'=>'PATCH','route'=>['proyecto.update',$proyecto->idproyecto]])!!}
              	{{Form::token()}}


                <div class="form-group">
                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$proyecto->nombreproyecto}}" class="form-control" placeholder="Ingrese Nombre">
                </div>

                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" value="{{$proyecto->descripcionproyecto}}" class="form-control" placeholder="Ingrese Descripción">
                </div>

                 <div class="form-group">
                  <label for="ubicacion">Ubicación</label>
                  <input type="text" name="ubicacion" value="{{$proyecto->ubicacionproyecto}}" class="form-control" placeholder="Ingrese Ubicación">
                </div>

                <div class="form-group">
                  <label for="codigosiaf">Codigo SIAF</label>
                  <input type="text" name="codigosiaf" value="{{$proyecto->codigosiaf}}" class="form-control" placeholder="Ingrese Codigo SIAF">
                </div>
                
                <div class="form-group">
                  <label for="idcatalogo">Catalogo</label>
                  <select name="idcatalogo" class="form-control">
                    @foreach ($catalogos as $cat)
                      @if ($cat->idcatalogo==$proyecto->idcatalogo)
                      <option value="{{$cat->idcatalogo}}" selected>{{$cat->nombrecatalogo}} </option>
                       @else 
                      <option value="{{$cat->idcatalogo}}">{{$cat->nombrecatalogo}} </option>
                       @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="iddepartamento">Departamento</label>
                  <select name="iddepartamento" class="form-control" id="select-departamento">
                    @foreach ($departamentos as $dep)
                      @if ($dep->iddepartamento==$proyecto->iddepartamento)
                      <option value="{{$dep->iddepartamento}}" selected>{{$dep->nombredepartamento}} </option>
                       @else 
                      <option value="{{$dep->iddepartamento}}">{{$dep->nombredepartamento}} </option>
                       @endif
                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="idprovincia">Provincia</label>
                  <select name="idprovincia" class="form-control">
                    @foreach ($provincias as $prov)
                      @if ($prov->idprovincia==$proyecto->idprovincia)
                      <option value="{{$prov->idprovincia}}" selected>{{$prov->nombreprovincia}} </option>
                       @else 
                      <option value="{{$prov->idprovincia}}">{{$prov->nombreprovincia}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="iddistrito">Distrito</label>
                  <select name="iddistrito" class="form-control">
                    @foreach ($distritos as $dis)
                      @if ($dis->iddistrito==$proyecto->iddistrito)
                      <option value="{{$dis->iddistrito}}" selected>{{$dis->nombredistrito}} </option>
                       @else 
                      <option value="{{$dis->iddistrito}}">{{$dis->nombredistrito}} </option>
                       @endif

                    @endforeach
                  </select>
                </div>

                <div class="form-group">
                  <label for="identidad">Entidad</label>
                  <select name="identidad" class="form-control">
                    @foreach ($entidades as $ent)
                      @if ($ent->identidad==$proyecto->identidad)
                      <option value="{{$ent->identidad}}" selected>{{$ent->nombreentidad}} </option>
                       @else 
                      <option value="{{$ent->identidad}}">{{$ent->nombreentidad}} </option>
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

