@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
active treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actres')
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
			<h3 class="box-title">Agregar Resolución a los estudios &nbsp &nbsp</h3>
			</div>
		<div class="box-body">
        <div class="table-responsive mailbox-messages">
          <table id="tabla" class="table table-bordered table-striped">
           <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Entidad</th>
                  <th>Estado</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="1px">{{ $est->idestudio}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->solicitud}}-{{ $est->nombreestudio}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->estado}}</td>
                  <td><a href="{{URL::action('ResolucionController@edit',$est->idestudio)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-file"></span></button></a>
                </td>
                </tr>
                @endforeach
                </tbody>
              <tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Entidad</th>
                  <th>Estado</th>
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