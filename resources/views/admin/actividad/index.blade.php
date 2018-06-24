@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actact')
active
@endsection

@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Actividades &nbsp &nbsp &nbsp <a href="{{ route('admin.actividad.create') }}"><button type="button" class="btn btn-primary">+ Nueva Actividad</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($actividades as $act)
                <tr>
                  <td width="1px">{{ $act->idactividad}}</td>
                  <td>{{ $act->nombreactividad}}</td>
                  <td>{{ $act->descripcionactividad}}</td>
                  <td><a href="{{URL::action('ActividadController@edit',$act->idactividad)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$act->idactividad}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.actividad.modal')
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