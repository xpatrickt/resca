@extends('layouts.administrator')

@section('actmenu2')
active treeview
@endsection
@section('acteva')
active
@endsection
@section('treemenu')
treeview
@endsection

@section ('contenido')

           
            <div class="row">

            {{ Form::open(['route' => 'admin.evaluacion.store']) }}
                {{Form::token()}}


            <div class="col-md-4">
              <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Agregar Observacion</a>
           
          
           <div class="box box-solid">
            <div class="box-header with-border">
              <div class="form-group">
                <h3 class="box-title">Proyectos</h3>
              </div>
               <div class="form-group">
                  <select name="proyecto" id="proyecto" class="form-control select2 dynamic" 
                  data-dependent="estudio">
              <option value="" >Seleccione Proyecto</option> 
              @if($proyecto==null) 
               @foreach($proyectos as $pro)
                 <option value="{{ $pro->idproyecto}}">{{ $pro->nombreproyecto}}</option>
               @endforeach
              @else
                @foreach($proyectos as $pro)
                @if($proyecto->idproyecto==$pro->idproyecto)
                 <option value="{{ $pro->idproyecto}}" selected>{{ $pro->nombreproyecto}}</option>
                 @else
                 <option value="{{ $pro->idproyecto}}">{{ $pro->nombreproyecto}}</option>
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
                  @foreach($entidades as $en)
                  @if($proyecto->identidad==$en->identidad)
                  <label>Entidad: </label> {{$en->nombreentidad}}<br>
                  @endif
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
                  <select name="estudio" id="estudio" class="form-control select2 dynamic" data-dependent="doc">
               @if($estudio!=null) 
               <option value="">Seleccione Estudio</option> 
               @foreach($estudios as $est)
                 @if($estudio->idestudio==$est->idestudio)
                 <option value="{{ $est->idestudio}}" selected>{{ $est->nombreestudio}}</option>
                 @else
                 <option value="{{ $est->idestudio}}">{{ $est->nombreestudio}}</option>
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
                  <label>Descripción: </label> {{$estudio->descripcionestudio}}<br>
                  @foreach($tiposevaluacion as $teva)
                   @if($estudio->idtipoevaluacion==$teva->idtipoevaluacion)
                   <label>Tipo evaluacion: </label> {{$teva->nombretipoevaluacion}}<br>
                   @endif
                  @endforeach
                  @foreach($tiposestudio as $test)
                   @if($estudio->idtipoestudio==$test->idtipoestudio)
                   <label>Tipo estudio: </label> {{$test->nombretipoestudio}}<br>
                   @endif
                  @endforeach
                @endif
                </div>
                </div>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block margin-bottom">Mostrar Detalle</button>

            </div>

            {!!Form::close()!!}

            <div class="col-md-8">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#documentos" data-toggle="tab">Documentos de Estudio</a></li>
              <li><a href="#observaciones" data-toggle="tab">Observaciones del Estudio</a></li>
            </ul>
            <div class="tab-content">

     <!--TAB DOCUMENTO*******************************************************-->

          <div class="active tab-pane" id="documentos">
            <div class="box-header with-border">
              <h3 class="box-title">Documentos : @if($estudio!=null) {{$estudio->nombreestudio}} @endif</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">

              <div class="table-responsive mailbox-messages">

<table id="tabla" class="table table-hover table-striped">
           <thead>
                <tr>
                  <th>Descripcion</th>
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
                <a  href="documentos\resolucion\180618215657.pdf "  target="_blank"><i class="fa fa-file-pdf-o"></i></a>
                </td>
                </tr>
          @include('admin.evaluacion.modal')
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
              <h3 class="box-title">Observaciones del Estudio</h3>

              <div class="box-tools pull-right">
                <div class="has-feedback">
                  <input type="text" class="form-control input-sm" placeholder="Buscar">
                  <span class="glyphicon glyphicon-search form-control-feedback"></span>
                </div>
              </div>
              <!-- /.box-tools -->
            </div>
            <!-- /.box-header -->
            <div class="box-body no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                 <!-- 1-50/200 -->
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
              </div>
              <div class="table-responsive mailbox-messages">
                <table class="table table-hover table-striped">
                  <tbody>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"></td>
                    <td class="mailbox-date">5 mins ago</td>
                  </tr>
                  <tr>
                    <td><input type="checkbox"></td>
                    <td class="mailbox-star"><a href="#"><i class="fa fa-star-o text-yellow"></i></a></td>
                    <td class="mailbox-name"><a href="read-mail.html">Alexander Pierce</a></td>
                    <td class="mailbox-subject"><b>AdminLTE 2.0 Issue</b> - Trying to find a solution to this problem...
                    </td>
                    <td class="mailbox-attachment"><i class="fa fa-paperclip"></i></td>
                    <td class="mailbox-date">28 mins ago</td>
                  </tr>
                                
                  </tbody>
                </table>
                <!-- /.table -->
              </div>
              <!-- /.mail-box-messages -->
            </div>
            <!-- /.box-body -->
            <div class="box-footer no-padding">
              <div class="mailbox-controls">
                <!-- Check all button -->
                <button type="button" class="btn btn-default btn-sm checkbox-toggle"><i class="fa fa-square-o"></i>
                </button>
                <div class="btn-group">
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-trash-o"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-reply"></i></button>
                  <button type="button" class="btn btn-default btn-sm"><i class="fa fa-share"></i></button>
                </div>
                <!-- /.btn-group -->
                <button type="button" class="btn btn-default btn-sm"><i class="fa fa-refresh"></i></button>
                <div class="pull-right">
                 <!-- 1-50/200-->
                  <div class="btn-group">
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-left"></i></button>
                    <button type="button" class="btn btn-default btn-sm"><i class="fa fa-chevron-right"></i></button>
                  </div>
                  <!-- /.btn-group -->
                </div>
                <!-- /.pull-right -->
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
    url:"{{ route('admin.evaluacion.listar') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     $('#'+dependent).html(result);
    }
   })

    $.ajax({
    url:"{{ route('admin.evaluacion.listarall') }}",
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
</script>

@endsection