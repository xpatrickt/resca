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
@section('actpro')
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
			<h3 class="box-title">Listado de Proyectos &nbsp &nbsp &nbsp <a href="{{ route('admin.proyecto.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Proyecto</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Descripción</th>
                  <th>Objetivo</th>
                  <th>Beneficiarios</th>
                  <th>Entidad</th>
                  <th>Ubicación</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($proyectos as $pro)
                <tr>
                  <td width="1px">{{ $pro->idproyecto}}</td>
                  <td>{{ $pro->nombreproyecto}}</td>
                  <td>{{ $pro->descripcionproyecto}}</td>
                  <td>{{ $pro->objetivoproyecto}}</td>
                  <td>{{ $pro->beneficiariosproyecto}}</td>          
                  <td>{{ $pro->entidad}}</td>
                  <td><a href=""><button class="btn btn-warning center-block"><span class="glyphicon glyphicon-map-marker"></span></button></a></td>
                  <td><a href="{{URL::action('ProyectoController@edit',$pro->idproyecto)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span>   </button></a>
                  <a href="" data-target="#modal-delete-{{$pro->idproyecto}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  </button></a>
                </td>
                </tr>
         @include('admin.proyecto.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Descripción</th>
                  <th>Objetivo</th>
                  <th>Beneficiarios</th>
                  <th>Entidad</th>
                  <th>Ubicación</th>
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