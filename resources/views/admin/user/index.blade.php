@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actgusu')
active
@endsection

@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Usuarios &nbsp &nbsp &nbsp <a href="{{ route('admin.user.create') }}"><button type="button" class="btn btn-primary">+ Nueva Persona</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>DNI</th>            
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($usuarios as $usu)
                <tr>
                  <td width="1px">{{$usu->id}}</td>
                  <td>{{ $usu->name}}</td>
                  <td>{{ $usu->email}}</td>
                  <td>{{ $usu->nombrepersona}}</td>
                  <td>{{ $usu->apellidospersona}}</td>  
                  <td>{{ $usu->dnipersona}}</td>                                           
                  <td><a href="{{URL::action('UserController@edit',$usu->id)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$usu->id}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.user.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Usuario</th>
                  <th>Email</th>
                  <th>Nombres</th>
                  <th>Apellidos</th>
                  <th>DNI</th>                                
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