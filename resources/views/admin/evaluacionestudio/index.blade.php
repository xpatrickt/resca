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
                  <th>N° SIGE</th>
                  <th>Solicitud</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Registro</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="1px">{{ $est->idestudio}}</td>
                  <td>{{ $est->codigosige}}</td>
                  <td>{{ $est->nombretiposolicitud}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->nombretipoestudio}}-{{ $est->nombreestudio}}</td>
                  <td>{{ $est->estado}}</td>
                  <td>{{ \Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s')}}</td>

                  <td>
                  <a href="" data-target="#modal-detalledelimitacion-{{$est->idestudio}}" data-id="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledelimitacion"><button class="btn btn-warning"><span class="glyphicon glyphicon-map-marker"></span></button></a>
                  <a href="" data-target="#modal-detalledocumento-{{$est->idestudio}}" data-idd="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledocumento"><button class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span></button></a>
                  @include('admin.registro.modaldetalledocumento')
                 @include('admin.registro.modaldetalledelimitacion')
                </td>
                <td>
                  <a href="{{URL::action('EvaluacionestudioController@edit',$est->idestudio)}}"><button class="btn btn-success"><span class="glyphicon glyphicon-thumbs-up"></span></button></a>
                  <a href="" data-target="#modal-delete-{{$est->idestudio}}" data-toggle="modal"><button class="btn btn-danger"><span class="glyphicon glyphicon-thumbs-down"></span></button></a>    
                  @include('admin.evaluacionestudio.modal')              
                </td>

                </tr>
                 
                
                @endforeach
                </tbody>
              <tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>N° SIGE</th>
                  <th>Solicitud</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Registro</th>
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
@section('script')

<script>


// MOSTRAR DELIMITACION Y DOCUMENTO DE ESTUDIO ***********************************

$(document).on("click", ".opendetalledocumento", function () {

  var idest = $(this).data('idd'); 
  var _token = $('input[name="_token"]').val();

//DOCUMENTOS

   $.ajax({
    url:"{{ route('admin.registro.listardocumento') }}",
    method:"POST",
    data:{idest:idest, _token:_token},
  
    success:function(result)
    {
      $(".modal-body #tabladocumento").html(result);
    }
   })

});


$(document).on("click", ".opendetalledelimitacion", function () {

  var idest = $(this).data('id'); 
  var _token = $('input[name="_token"]').val();

//DELIMITACION
   
   $.ajax({
    url:"{{ route('admin.registro.listardelimitacion') }}",
    method:"POST",
    data:{idest:idest, _token:_token},
  
    success:function(result)
    {
      $(".modal-body #tabladelimitacion").html(result);

    }
   })

});


// FIN MOSTRAR DELIMITACION Y DOCUMENTO DE ESTUDIO ***********************************



//*********************************************************************************************************************

</script>

@endsection
