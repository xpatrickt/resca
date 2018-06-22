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

            {!!Form::open(array('url'=>'admin/evaluacion','method'=>'POST','autocomplete'=>'off'))!!}
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
              <option value="">Seleccione Proyecto</option>  
               @foreach($proyectos as $pro)
                 <option value="{{ $pro->idproyecto}}">{{ $pro->nombreproyecto}}</option>
               @endforeach
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
                </div>
                </div>
            </div>
          </div>

            </div>

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
              <h3 class="box-title">Documentos del Estudio</h3>

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
                <table id="tabla" name="tabladocumento" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th >Documentos</th>

                 </tr>
                </thead>
                <tbody id="bodydocumentos">

                </tbody>

          </table>
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

             
{!!Form::close()!!}
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

//DOCUMENTOS Y OBSERVACIONES ESTUDIO
 $('#estudio').change(function(){

  var idestudio = $('#estudio').val(); 
   var _token = $('input[name="_token"]').val();

   alert("documentos y observaciones"+idestudio);

    $.ajax({
    url:"{{ route('admin.evaluacion.listardocumentos') }}",
    method:"POST",
    data:{idestudio:idestudio, _token:_token},
    success:function(result)
    {
      
     $('#bodydocumentos').html(result);
    }
   })

 });
 

});
</script>

@endsection