@extends('layouts.inicio')
@section('pagina')
<h1>Estado de Evaluación Ambiental</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Estado de Evaluación Ambiental
@stop

@section('contenido')
<div class="data-table-container">
          <table id="tabla" class="table table-bordered table-striped data-table">
         
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Nº SIGE</th>
                  <th>Actividad</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                                    <th>Estudio</th>
                  <th>Estudio</th>
                  <th>Estado</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="5px">{{$est->idestudio}}</td>
                  <td>{{ $est->sige}}</td>
                  <td>{{ $est->actividad}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->solicitud}}-{{ $est->nombreestudio}}</td>
                  <td>
                  <a href="" data-target="#modal-detalledocumento-{{$est->idestudio}}" data-idd="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledocumento"><button class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span></button></a>
                  @include('reportes.modaldetalledocumento')
                </td>
                  <td>{{ $est->estado}}</td>

                </tr>
               @endforeach
                </tbody>

          </table>


      
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
    url:"{{ route('estadoevaluacion.listardocumento') }}",
    method:"POST",
    data:{idest:idest, _token:_token},
  
    success:function(result)
    {
      $(".modal-body #tabladocumento").html(result);
    }
   })

});
//*********************************************************************************************************************

</script>

@endsection