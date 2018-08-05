@extends('layouts.administrator')
@section('actmenu1')
active treeview
@endsection
@section('actsol')
active
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actmenu4')
treeview
@endsection
@section ('contenido')


<section class="content">
  <div class="row">
  <div class="col-xs-12">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Estado de Solicitud de Registro Ambiental</h3>
      </div>
    <div class="box-body">
        <div class="table-responsive mailbox-messages">
          <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th width="1px">ID</th>
                  <th>N° SIGE</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="1px">{{$est->idestudio}}</td>
                  <td>{{ $est->codigosige}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->nombretipoestudio}}-{{ $est->nombreestudio}}</td>
                  <td>{{ $est->estado}}</td>
                  <td>{{ \Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s')}}</td>
                  <td>
                  <a href="" data-target="#modal-detalledelimitacion-{{$est->idestudio}}" data-id="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledelimitacion"><button class="btn btn-success"><span class="glyphicon glyphicon-map-marker"></span></button></a>
                  <a href="" data-target="#modal-detalledocumento-{{$est->idestudio}}" data-idd="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledocumento"><button class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span></button></a>
                  
                @include('admin.registro.modalenviar')
                @include('admin.registro.modaldetalledocumento')
                @include('admin.registro.modaldetalledelimitacion')
               
                </td>
                </tr>
               @endforeach
                </tbody>
             <tfoot>
                <tr>
                  <th width="1px">ID</th>
                  <th>N° SIGE</th>
                  <th>Estudio</th>
                  <th>Proyecto</th>
                  <th>Entidad</th>
                  <th>Estado</th>
                  <th>Fecha</th>
                  <th>Opción</th>
                </tr>
                </tfoot>
          </table>
        </div>
  </div>
  @if(count($estudios)!=0)
  
  @endif
  
 
    </div>

  </div>
</div>

</section>





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



// AGREGAR DEPARTAMENTO PROVINCIA Y DISTRITO AJAX

$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');

   var _token = $('input[name="_token"]').val();


   $.ajax({
    url:"{{ route('admin.proyecto.listar') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     
     $('#'+dependent).html(result);
    }
   })
  }
   else{
    var depen = $(this).data('dependent');
    
    if(depen=='provincia'){
    document.getElementById('provincia').length=0;
    document.getElementById('distrito').length=0;
     }
     if(depen=='distrito'){
      document.getElementById('distrito').length=0;
     }
    
   }
 });

 $('#departamento').change(function(){
  $('#provincia').val('');
  $('#distrito').val('');
 });

 $('#provincia').change(function(){
  $('#distrito').val('');
 });

 });

//*********************************************************************************************************************

</script>

@endsection

