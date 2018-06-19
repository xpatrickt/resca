@extends('layouts.administrator')
@section('actmenu2')
treeview
@endsection
@section('actmenu3')
active
@endsection

@section('treemenu')
treeview
@endsection

@section ('contenido')
 

           
            <div class="row">

            {!!Form::open(array('url'=>'admin/seguimiento','method'=>'POST','autocomplete'=>'off'))!!}
                {{Form::token()}}

            <div class="col-md-4">
              <a href="compose.html" class="btn btn-primary btn-block margin-bottom">Respuesta Evaluacion</a>
           
          
           <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Proyectos</h3>
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
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
               </div>
              </div>
               <div class="box-body">
                <textarea id="tproyecto" style="min-width: 100%">

                </textarea>
           
            </div>
          </div>

 
           <div class="box box-default collapsed-box">
              <div class="box-header with-border">
                <h3 class="box-title">Estudios</h3>
               <div class="form-group">
                  <select name="estudio" id="estudio" class="form-control select2 dinamic">
                  </select>
                </div>
                <div class="box-tools">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
               </div>
              </div>

               <div class="box-body">

            </div>
          </div>

            </div>

            <div class="col-md-8">
          <div class="box box-primary">
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
          <!-- /. box -->
        </div>

        {{ csrf_field() }}

             
{!!Form::close()!!}
            </div>
                 
  

@endsection


@section('script')
<script>


$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');
   var ta= '#t'+select;

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
    url:"{{ route('admin.seguimiento.listar') }}",
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

 

});
</script>

@endsection