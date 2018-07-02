@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('acttes')
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
			<h3 class="box-title">Listado de Tipos de Estudio &nbsp &nbsp &nbsp <a href="{{ route('admin.tipoestudio.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Tipo de Estudio</button></a></h3>
			</div>
		<div class="box-body">
   <div class="table-responsive mailbox-messages">
		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Siglas</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($tipoestudios as $tes)
                <tr>
                  <td width="1px">{{ $tes->idtipoestudio}}</td>
                  <td>{{ $tes->nombretipoestudio}}</td>
                  <td>{{ $tes->siglastipoestudio}}</td>
                  <td><a href="{{URL::action('TipoestudioController@edit',$tes->idtipoestudio)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$tes->idtipoestudio}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.tipoestudio.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Siglas</th>
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