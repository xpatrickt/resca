@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('acttev')
active
@endsection
@section('actmenu4')
treeview
@endsection

@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Tipos de Evaluación &nbsp &nbsp &nbsp <a href="{{ route('admin.tipoevaluacion.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Tipo de Evaluación</button></a></h3>
			</div>
		<div class="box-body">
   <div class="table-responsive mailbox-messages">
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
                  <td><a href="{{URL::action('TipoevaluacionController@edit',$tev->idtipoevaluacion)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$tev->idtipoevaluacion}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
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
</div>

</section>


</div>


@endsection