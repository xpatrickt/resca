@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actdoc')
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
			<h3 class="box-title">Documentos de estudio &nbsp &nbsp &nbsp <a href="{{ route('admin.documento.create') }}"><button type="button" class="btn btn-primary">+ Nuevo Documento</button></a></h3>
			</div>
		<div class="box-body">

		<table id="tabla" class="table table-bordered table-striped">
			     <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($documentos as $doc)
                <tr>
                  <td width="1px">{{ $doc->iddocumento}}</td>
                  <td>{{ $doc->nombredocumento}}</td>
                  <td>{{ $doc->descripciondocumento}}</td>
                  <td><a href="{{URL::action('DocumentoController@edit',$doc->iddocumento)}}"><button class="btn btn-info"><span class="glyphicon glyphicon-pencil"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$doc->iddocumento}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button></a>
                </td>
                </tr>
         @include('admin.documento.modal')
				@endforeach

                </tbody>
				<tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Nombre</th>
                  <th>Descripción</th>
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