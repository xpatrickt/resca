@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actdep')
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
			<h3 class="box-title">Listado de Departamentos &nbsp &nbsp &nbsp <a href="{{ route('admin.departamento.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Departamento</button></a></h3>
			</div>
		<div class="box-body">
    <div class="table-responsive mailbox-messages">
		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">Codigo</th>
                  <th>Departamento</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($departamentos as $dep)
                <tr>
                  <td width="1px">{{ $dep->iddepartamento}}</td>
                  <td>{{ $dep->nombredepartamento}}</td>
                  <td><a href="{{URL::action('DepartamentoController@edit',$dep->iddepartamento)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$dep->iddepartamento}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.departamento.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">Codigo</th>
                  <th>Departamento</th>
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