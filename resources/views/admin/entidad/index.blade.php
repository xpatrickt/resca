@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actent')
active
@endsection
@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Entidades &nbsp &nbsp &nbsp <a href="entidad/create"><button type="button" class="btn btn-primary">+ Nueva Entidad</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Email</th>                  
                  <th>RUC</th>
                  <th>Actividad</th>   
                  <th>representante</th>                
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($entidades as $ent)
                <tr>
                  <td width="1px">{{ $ent->identidad}}</td>
                  <td>{{ $ent->nombreentidad}}</td>
                  <td>{{ $ent->direccionentidad}}</td>
                  <td>{{ $ent->telefonoentidad}}</td>
                  <td>{{ $ent->emailentidad}}</td>                  
                  <td>{{ $ent->rucentidad}}</td>
                  <td>{{ $ent->actividad}}</td>    
                  <td>{{ $ent->representante}}</td>                                    
                  <td><a href="{{URL::action('EntidadController@edit',$ent->identidad)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$ent->identidad}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.entidad.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Dirección</th>
                  <th>Teléfono</th>
                  <th>Email</th>  
                  <th>RUC</th>
                  <th>Actividad</th>  
                  <th>representante</th>                    
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