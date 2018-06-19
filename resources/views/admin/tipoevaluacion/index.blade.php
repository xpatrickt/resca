@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('acttev')
active
@endsection


@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Tipos de Evaluación &nbsp &nbsp &nbsp <a href="tipoevaluacion/create"><button type="button" class="btn btn-primary">+ Nuevo Cargo</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($tipoevaluaciones as $tev)
                <tr>
                  <td width="1px">{{ $tev->idtipoevaluacion}}</td>
                  <td>{{ $tev->nombretipoevaluacion}}</td>
                  <td><a href="{{URL::action('TipoevaluacionController@edit',$tev->idtipoevaluacion)}}"><button class="btn btn-info">Editar &nbsp</button></a>
                  <a href="" data-target="#modal-delete-{{$tev->idtipoevaluacion}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                </td>
                </tr>
         @include('admin.tipoevaluacion.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
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