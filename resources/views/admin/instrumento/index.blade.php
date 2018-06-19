@extends('layouts.administrator')

@section('treemenu')
active treeview
@endsection
@section('actinst')
active
@endsection

@section ('contenido')

<div >

<section class="content">
	<div class="row">
	<div class="col-xs-12">
		<div class="box">
		<div class="box-header">
			<h3 class="box-title">Listado de Instrumentos de Gestión &nbsp &nbsp &nbsp <a href="instrumento/create"><button type="button" class="btn btn-primary">+ Nuevo Instrumento de Gestión</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Siglas</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($instrumentos as $inst)
                <tr>
                  <td width="1px">{{ $inst->idinstrumentog}}</td>
                  <td>{{ $inst->nombreinstrumentog}}</td>
                  <td>{{ $inst->siglasinstrumentog}}</td>
              
                  <td><a href="{{URL::action('InstrumentoController@edit',$inst->idinstrumentog)}}"><button class="btn btn-info">Editar &nbsp</button></a>
                  <a href="" data-target="#modal-delete-{{$inst->idinstrumentog}}" data-toggle="modal"><button class="btn btn-danger">Eliminar</button></a>
                </td>
                </tr>
         @include('admin.instrumento.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Siglas</th>
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