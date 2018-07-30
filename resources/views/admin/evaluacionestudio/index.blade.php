@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('acteve')
active
@endsection
@section('actmenu4')
active treeview
@endsection
@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Gestionar Solicitud de Evaluación &nbsp &nbsp</h3>
			</div>
		<div class="box-body">
        <div class="table-responsive mailbox-messages">
          <table id="tabla" class="table table-bordered table-striped">
           <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Estudio</th>
                  <th>Descripción</th>
                  <th>Proyecto</th>
                  <th>Entidad</th>
                  <th>Estado</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="1px">{{ $est->idestudio}}</td>
                  <td>{{ $est->nombreestudio}}</td>
                  <td>{{ $est->descripcionestudio}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->estado}}</td>
                  <td><a href="{{URL::action('EvaluacionestudioController@edit',$est->idestudio)}}"><button class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$est->idestudio}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span></button></a>
                </td>

                </tr>
                @include('admin.evaluacionestudio.modal')
                @endforeach
                </tbody>
              <tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Estudio</th>
                  <th>Descripción</th>
                  <th>Proyecto</th>
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