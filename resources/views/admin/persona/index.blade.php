@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actper')
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
			<h3 class="box-title">Listado de Personas &nbsp &nbsp &nbsp <a href="{{ route('admin.persona.create') }}"><button type="button" class="btn btn-primary">+ Nueva Persona</button></a></h3>
			</div>
		<div class="box-body">
    <div class="table-responsive mailbox-messages">
		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>DNI</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Email</th>   
                  <th>Cargo</th>
                  <th>Entidad</th>                                   
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($personas as $per)
                <tr>
                  <td width="1px">{{ $per->idpersona}}</td>
                  <td>{{ $per->nombrepersona}}</td>
                  <td>{{ $per->apellidospersona}}</td>
                  <td>{{ $per->dnipersona}}</td>
                  <td>{{ $per->telefonopersona}}</td>
                  <td>{{ $per->direccionpersona}}</td>
                  <td>{{ $per->emailpersona}}</td>  
                  <td>{{ $per->cargo}}</td>
                  <td>{{ $per->entidad}}</td>                                  
                  <td><a href="{{URL::action('PersonaController@edit',$per->idpersona)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$per->idpersona}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.persona.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Apellidos</th>
                  <th>DNI</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>
                  <th>Email</th>   
                  <th>Cargo</th>
                  <th>Entidad</th>                                   
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