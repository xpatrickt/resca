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

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Provincias &nbsp &nbsp &nbsp <a href="{{ route('admin.provincia.create') }}"><button type="button" class="btn btn-primary">+ Nueva Provincia</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">Codigo</th>
                  <th>Provincia</th>
                  <th>Departamento</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($provincias as $prov)
                <tr>
                  <td width="1px">{{ $prov->idprovincia}}</td>
                  <td>{{ $prov->nombreprovincia}}</td>
                  <td>{{ $prov->departamento}}</td>
                  <td><a href="{{URL::action('ProvinciaController@edit',$prov->idprovincia)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$prov->idprovincia}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.provincia.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">Codigo</th>
                  <th>Provincia</th>
                  <th>Departamento</th>
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