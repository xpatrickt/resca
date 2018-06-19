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

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Catálogos &nbsp &nbsp &nbsp <a href="catalogo/create"><button type="button" class="btn btn-primary">+ Nuevo Catálogo</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Actividad</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($catalogos as $cat)
                <tr>
                  <td width="1px">{{ $cat->idcatalogo}}</td>
                  <td>{{ $cat->nombrecatalogo}}</td>
                  <td>{{ $cat->descripcioncatalogo}}</td>
                  <td>{{ $cat->actividad}}</td>
                  <td><a href="{{URL::action('CatalogoController@edit',$cat->idcatalogo)}}"><button class="btn btn-info">Editar &nbsp</button></a>
                  <a href="" data-target="#modal-delete-{{$cat->idcatalogo}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                </td>
                </tr>
         @include('admin.catalogo.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Opción</th>
                </tr>
                </tfoot>
		</table>

	</div>

		</div>

	</div>
</div>

</section>


</div>


@endsection