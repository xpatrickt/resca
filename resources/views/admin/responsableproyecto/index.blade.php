@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actrep')
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
			<h3 class="box-title">Asignar Responsable a los Proyectos &nbsp &nbsp</h3>
			</div>
		<div class="box-body">

          <table id="tabla" class="table table-bordered table-striped">
           <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Responsable</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($proyectos as $pro)
                <tr>
                  <td width="1px">{{ $pro->idproyecto}}</td>
                  <td>{{ $pro->nombreproyecto}}</td>
                  <td>{{ $pro->responsable}}</td>
                  @if(!$pro->responsable)
                  <td><a href="{{URL::action('ResponsableproyectoController@edit',$pro->idproyecto)}}"><button class="btn btn-success"><span class="glyphicon glyphicon-user"></span></button></a>
                  @else
                  <td><a href=""><button class="btn btn-success" disabled="disabled"><span class="glyphicon glyphicon-user"></span></button></a>

                  @endif
                </td>
                </tr>
                @endforeach
                </tbody>
              <tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>Proyecto</th>
                  <th>Responsable</th>
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