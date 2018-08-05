@extends('layouts.administrator')
@section('actmenu1')
active treeview
@endsection
@section('actproy')
active
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
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
			<h3 class="box-title">Listado de Proyectos &nbsp &nbsp &nbsp <a href="{{ route('admin.proyectouser.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Proyecto</button></a></h3>
			</div>
		<div class="box-body">
  <div class="table-responsive mailbox-messages">
		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Descripción</th>
                  <th>Objetivo</th>
                  <th>Beneficiarios</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($proyectos as $pro)
                <tr>
                  <td width="1px">{{ $pro->idproyecto}}</td>
                  <td>{{ $pro->entidad}}</td>
                  <td>{{ $pro->nombreproyecto}}</td>
                  <td>{{ $pro->descripcionproyecto}}</td>
                  <td>{{ $pro->objetivoproyecto}}</td>
                  <td>{{ $pro->beneficiariosproyecto}}</td>          
                  <td>
                  @if($pro->estudio=='0')
                  <a href="" data-target="#modal-delete-{{$pro->idproyecto}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span>  </button></a>
                  @else
                  <button class="btn btn-danger" disabled='disabled'><span class="glyphicon glyphicon-trash"></span>  </button>
                  @endif
                </td>
                </tr>
         @include('admin.proyectouser.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Descripción</th>
                  <th>Objetivo</th>
                  <th>Beneficiarios</th>
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