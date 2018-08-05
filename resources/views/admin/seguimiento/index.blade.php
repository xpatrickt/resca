@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('actmenu3')
active 
@endsection
@section('treemenu')
treeview
@endsection
@section('actmenu4')
treeview
@endsection
@section ('contenido')

           
            <div class="row">

            <div class="col-md-4">

              <!--
              <a href="" data-target="#modal-agregarobservacion" data-toggle="modal" class="btn btn-primary btn-block margin-bottom">Agregar Observación</a>
                 
            @include('admin.evaluacion.modalagregarobservacion')
               -->

   {{ Form::open(['route' => 'admin.seguimiento.store']) }}
   {{Form::token()}}
    <div class="box box-solid">
      <div class="box-header with-border">
         <div class="form-group">
           <h3 class="box-title">Proyectos</h3>
              </div>
               <div class="form-group">
                  <select name="proyecto" id="proyecto" class="form-control select2 dynamic" 
                  style="width: 100%;" data-dependent="estudio">
              <option value="" >Seleccione Proyecto</option> 
              @if($proyecto==null) 
               @foreach($proyectos as $pro)
                 <option value="{{ $pro->idproyecto}}">{{$pro->idproyecto}}-{{$pro->nombreproyecto}}</option>
               @endforeach
              @else
                @foreach($proyectos as $pro)
                @if($proyecto->idproyecto==$pro->idproyecto)
                 <option value="{{ $pro->idproyecto}}" selected>{{$pro->idproyecto}}-{{ $pro->nombreproyecto}}</option>
                 @else
                 <option value="{{ $pro->idproyecto}}">{{$pro->idproyecto}}-{{ $pro->nombreproyecto}}</option>
                 @endif
               @endforeach
               @endif
                  </select>
                </div>
                 <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              </div>
               <div class="box-body no-padding">
                <div class="form-group">
                <div id="tproyecto" name="tproyecto" style="margin: 10px 0 0 10px;">
                @if($proyecto!=null)
                  <label>Descripción: </label> {{$proyecto->descripcionproyecto}}<br>
                  <label>Objetivo: </label> {{$proyecto->objetivoproyecto}}<br>
                  <label>Beneficiarios: </label> {{$proyecto->beneficiariosproyecto}}<br>
                  @foreach($entidad as $en)
                  <label>Entidad: </label> {{$en->nombreentidad}}<br>
                  @endforeach
                @endif
                </div>
                </div>
            </div>
          </div>

          <div class="box box-solid">
            <div class="box-header with-border">
              <div class="form-group">
                <h3 class="box-title">Estudios</h3>
              </div>
               <div class="form-group">
                  <select name="estudio" id="estudio" class="form-control select2 dynamic" style="width: 100%;" data-dependent="doc">
               @if($estudio!=null) 
               <option value="">Seleccione Estudio</option> 
               @foreach($estudios as $est)
                 @if($estudio->idestudio==$est->idestudio)
                 <option value="{{ $est->idestudio}}" selected>{{ $est->idestudio}}-{{ $est->nombreestudio}}</option>
                 @else
                 <option value="{{ $est->idestudio}}">{{ $est->idestudio}}-{{ $est->nombreestudio}}</option>
                 @endif
               @endforeach
               @endif

                  </select>
                </div>
                 <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
              </div>
              </div>
               <div class="box-body no-padding">
                <div class="form-group">
                <div id="testudio" name="testudio" style="margin: 10px 0 0 10px;">
                @if($estudio!=null)
                  @foreach($detalleestudio as $det)
                   <label>Tipo evaluacion: </label> {{$det->tipoevaluacion}}<br>
                   <label>Tipo estudio: </label> {{$det->tipoestudio}}<br>
                   <label>Estado: </label> {{$det->nombreestado}}<br>
                  @endforeach
                @endif
                </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block margin-bottom">Mostrar Detalle</button>
           {!!Form::close()!!}
            </div>


     <!--TABS DOCUMENTO OBSERVACION Y LEVANTAMIENTO DE OBSERVACION*******************************************************-->

            <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#documentos" data-toggle="tab">Documentos de Estudio</a></li>
              <li><a href="#observaciones" data-toggle="tab">Observaciones del Estudio</a></li>
              <li><a href="#respuestas" data-toggle="tab">Levantamientos de Observación</a></li>
            </ul>
            <div class="tab-content">

     <!--TAB DOCUMENTO*******************************************************-->

          <div class="active tab-pane" id="documentos">
            <div class="box-header with-border">
              <h5>Documentos : @if($estudio!=null) {{$estudio->nombreestudio}} @endif</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">

            <table id="tabla" class="table table-hover table-striped">
           <thead>
                <tr>
                  <th>Documento</th>
                  <th>Tipo</th>
                  <th>Fecha</th>
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @if($documentos!=null)
                @foreach ($documentos as $doc)
                <tr>
                  <td>{{ $doc->descdocumentoestudio}}</td>
                  <td>{{ $doc->tipodocumento}}</td>
                  <td>{{ $doc->created_at}}</td>
                  <td>
                <a  href="..{{$doc->urldocumentoestudio}}"  target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                </td>
                </tr>
          @endforeach
          @endif

                </tbody>
                 <tfoot>
               
                </tfoot>
            </table>
           </div>

                <!-- /.table -->
              </div>

          </div>

      <!--TAB OBSERVACIONES*******************************************************-->
          <div class="tab-pane" id="observaciones">
          <div class="box-header with-border">
              <h5>Observaciones : @if($estudio!=null) {{$estudio->nombreestudio}} @endif</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">

    <table id="tabla2" class="table table-hover table-striped">
           <thead>
                <tr>
                  <th></th>
                  <th>Evaluador</th>
                  <th>Observación</th>
                  <th>Fecha</th>
                  <th>Responder</th>
                 </tr>
                </thead>
                <tbody>
                @if($observaciones!=null)
                @foreach ($observaciones as $obs)
                <tr>
                  <td><center>@if($obs->condicion==1)
                    <i class="fa fa-star text-yellow"></i>
                    @else
                    <i class="fa fa-star-o text-yellow"></i>
                    @endif
                  </center></td>
                  <td>{{$obs->nombre}}</td>
                  <td><a href="" data-target="#modal-observacion-{{$obs->idobservacion}}" data-id="{{$obs->idobservacion}}" data-evaluador="{{$obs->nombre}}" data-asunto="{{$obs->asuntoobservacion}}" data-descripcion="{{$obs->descripcionobservacion}}" data-fecha="{{$obs->created_at}}" data-toggle="modal" class="openobservacion">{{$obs->asobservacion}}...</a></td>
                  <td>{{$obs->created_at}}</td>
                  <td><center><a href="{{URL::action('SeguimientoController@edit',$obs->idobservacion)}}"><i class="fa fa-envelope-o"></i></a></center></td>
                </tr>
                 @include('admin.seguimiento.modalobservacion')
                @endforeach
               @endif
               


                </tbody>
              <tfoot>
               
                </tfoot>
            </table>
           </div>
              </div>
          </div>

          <!--TAB RESPUESTAS*******************************************************-->
          <div class="tab-pane" id="respuestas">
            <div class="box-header with-border">
              <h5>Levantamiento de Observaciones : @if($estudio!=null) {{$estudio->nombreestudio}} @endif</h5>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">

             <table id="tabla3" class="table table-hover table-striped">
              <thead>
                <tr>
                  <th></th>
                  <th>Observación</th>
                  <th>Respuesta</th>
                  <th>Fecha</th>
                 </tr>
                </thead>
                <tbody>
                @if($respuestasobservacion!=null)
                @foreach ($respuestasobservacion as $res)
                <tr>
                  <td><center>@if($res->condicion==1)
                    <i class="fa fa-star text-yellow"></i>
                    @else
                    <i class="fa fa-star-o text-yellow"></i>
                    @endif
                  </center></td>
                  <td>{{ $res->asobservacion}}...</td>
                  <td><a href="" data-target="#modal-respuesta-{{$res->idrespuestaobservacion}}" data-id="{{$res->idrespuestaobservacion}}" data-asunto="{{$res->asuntorespuesta}}" data-observacion="{{$res->asuntoobservacion}}" data-descripcion="{{$res->descripcionrespuesta}}" data-fecha="{{$res->created_at}}" data-toggle="modal" class="openrespuesta">{{$res->asrespuesta}}...</a>
                  <td>{{$res->created_at}}</td>
                </tr>
                 @include('admin.seguimiento.modalrespuesta')
              @endforeach 
              @endif


                </tbody>
              <tfoot>
               
                </tfoot>
            </table>
           </div>
              </div>
          </div>
            </div>
          </div>





        </div>

        {{ csrf_field() }}

             

            </div>
                 
  

@endsection


@section('script')
<script>


$(document).ready(function(){

  //LISTAR PROYECTO Y ESTUDIO

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");    //proyecto
   var value = $(this).val();          // valor proyecto
   var dependent = $(this).data('dependent');
   var ta= 't'+select; //tproyecto
   document.getElementById("testudio").textContent = "";

   var _token = $('input[name="_token"]').val();

  $.ajax({
    url:"{{ route('admin.seguimiento.listar') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }
   })

    $.ajax({
    url:"{{ route('admin.seguimiento.listarall') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, ta:ta},
    success:function(result)
    {

     $('#'+ta).html(result);
    }
   })
  }

   else{
    var depen = $(this).data('dependent');
 
    if(depen=='estudio'){
      document.getElementById("tproyecto").textContent = "";
      document.getElementById("testudio").textContent = "";
       document.getElementById('estudio').length=0;
     }
   if(depen=='doc'){
      document.getElementById("testudio").textContent = "";
     }
    
   }
 });
});


// MOSTRAR DOCUMENTO DE OBSERVACION ***********************************

$(document).on("click", ".openobservacion", function () {

 var idobs = $(this).data('id'); 
  var _token = $('input[name="_token"]').val();

//DOCUMENTOS
   $.ajax({
    url:"{{ route('admin.seguimiento.mostrardocumento') }}",
    method:"POST",
    data:{idobs:idobs, _token:_token},
  
    success:function(result)
    {
      $(".modal-body #documentosobservacion").html(result);
    }
   })

});
// FIN MOSTRAR  DOCUMENTO DE OBSERVACION ***********************************


// MOSTRAR DOCUMENTO DE RESPUESTA ***********************************

$(document).on("click", ".openrespuesta", function () {

 var idresp = $(this).data('id'); 
  var _token = $('input[name="_token"]').val();

//DOCUMENTOS
   $.ajax({
    url:"{{ route('admin.seguimiento.mostrarrespuesta') }}",
    method:"POST",
    data:{idresp:idresp, _token:_token},
  
    success:function(result)
    {
      $(".modal-body #documentosrespuesta").html(result);
    }
   })

});
// FIN MOSTRAR  DOCUMENTO DE RESPUESTA ***********************************
</script>

@endsection