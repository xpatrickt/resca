@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actest')
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
			<h3 class="box-title">Listado de Estados &nbsp &nbsp &nbsp <a href="{{ route('admin.estado.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Estado</button></a></h3>
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
                @foreach ($estados as $est)
                <tr>
                  <td width="1px">{{ $est->idestado}}</td>
                  <td>{{ $est->nombreestado}}</td>
                  <td><a href="{{URL::action('EstadoController@edit',$est->idestado)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$est->idestado}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.estado.modal')
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