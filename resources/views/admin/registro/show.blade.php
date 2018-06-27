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

<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box">
   <div class="box-header with-border">
  <h3 class="box-tittle">Estudio: {{$estudio->nombreestudio}}</h3>
  @if(count($errors)>0)
  <div class="alert alert-danger">
   <ul>
    @foreach($errors->all() as $error)
    <li>{{$error}}</li>
     @endforeach
    </ul>
    </div>
    @endif
    </div>
      <div class="box-body">
<!--TABS DELIMITACION Y DOCUMENTO ESTUDIO*******************************************************-->

          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#delimitaciones" data-toggle="tab">Delimitaciones de Estudio</a></li>
              <li><a href="#documentos" data-toggle="tab">Documentos de Estudio</a></li>
            </ul>
            <div class="tab-content">

     <!--TAB DELIMITACION *******************************************************-->

          <div class="active tab-pane" id="delimitaciones">
            <div class="box-body no-padding">
            <div class="table-responsive mailbox-messages">

             {{ Form::open(['route' =>'admin.observacionevaluacion.edit']) }}
             {{Form::token()}}
             {!!Form::close()!!}

            <table id="tabla2" class="table table-hover table-striped">
                 <thead>
                  <tr>
                  <th>Provincia</th>
                  <th>Distrito</th>
                  <th>Delimitación</th>
                 <th>Coordenadas</th>
                 </tr>
                </thead>
                <tbody>
               @foreach($delimitaciones as $delimitacion)
                <tr>
                <td>{{$delimitacion->provincia}}</td>
                <td>{{$delimitacion->distrito}}</td>
                <td>{{$delimitacion->descripciondelimitacion}}</td> 
                <td>x: {{$delimitacion->coordenadasx}} y: {{$delimitacion->coordenadasy}}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
           </div>
          </div>
          </div>
      <!-- FIN TAB DELIMITACION-->
      <!--TAB DOCUMENTO*******************************************************-->
          <div class="tab-pane" id="documentos">
            <div class="box-body no-padding">
              <div class="table-responsive mailbox-messages">

             {{ Form::open(['route' =>'admin.observacionevaluacion.update']) }}
             {{Form::token()}}
             {!!Form::close()!!}

             <table id="tabla3" class="table table-hover table-striped">
              <thead>
                  <tr>
                     <th>Documento</th>
                     <th>Tipo</th>
                     <th>Fecha</th>
                     <th></th>
                 </tr>
                </thead>
                <tbody>
                @foreach($documentos as $documento)
                 <tr>
                     <td>{{$documento->descdocumentoestudio}}</td>
                     <td>{{$documento->tipodocumento}}</td>
                     <td>{{$documento->created_at}}</td> 
                     <td><a  href="..{{$documento->urldocumentoestudio}}"  target="_blank"><i class="fa fa-file-pdf-o"></i></a></td>
                 </tr>
                @endforeach
                </tbody>              
            </table>
           </div>
           </div>
          </div>
      <!-- FIN TAB DOCUMENTO-->
          </div>
          </div>

 <!-- FIN TAB DELIMITACION Y DOCUMENTO ESTUDIO-->
        </div>
      </div>
  </div>
  </div>
</div>
</section>
  

@endsection


@section('script')
<script>


$(document).ready(function(){

});
</script>

@endsection