@extends('layouts.administrator')
@section('actmenu1')
active treeview
@endsection
@section('actreg')
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
      <h3 class="box-title">Registros Ambientales &nbsp &nbsp &nbsp <a href="registro/create"><button type="button" class="btn btn-primary">+ Nuevo Registro</button></a></h3>
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
                  <th>Opción</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="1px">{{$est->idestudio}}</td>
                  <td>{{ $est->codigosige}}</td>
                  <td>{{ $est->nombretiposolicitud}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->nombretipoestudio}}-{{ $est->nombreestudio}}</td>
                  <td>{{ $est->estado}}</td>
                  <td>{{ \Carbon\Carbon::parse($est->fecha)->format('d/m/Y H:i:s')}}</td>
                  
                  <td>
                  <a href="" data-target="#modal-detalledelimitacion-{{$est->idestudio}}" data-id="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledelimitacion"><button class="btn btn-success"><span class="glyphicon glyphicon-map-marker"></span></button></a>
                  <a href="" data-target="#modal-detalledocumento-{{$est->idestudio}}" data-idd="{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal" class="opendetalledocumento"><button class="btn btn-info"><span class="glyphicon glyphicon-folder-open"></span></button></a>
                  <a href="{{URL::action('RegistroController@show',$est->idestudio)}}"><button class="btn btn-warning"><span class="glyphicon glyphicon-pencil"></span></button></a>
                   <a href="" data-target="#modal-enviar-{{$est->idestudio}}" data-nombre="{{$est->nombreestudio}}" data-toggle="modal"><button class="btn btn-primary">ENVIAR SOLICITUD</button></a>
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
                  <th>Solicitud</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
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


//CARGAR MAPA

function cargarmapa(){
//CARGAR MAPA BUSQUEDA Y PUNTERO

var map = new google.maps.Map(document.getElementById('mapacanvas'),{
    center:{
      lat: -14.10,
      lng: -73.13
    },
    zoom:7
  });

  var marker = new google.maps.Marker({
    position: {
      lat: -14.10,
      lng: -73.13
    },
    map: map,
    draggable: true
  });


  var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

   // $('#lat').val(lat);
   // $('#lng').val(lng);


  var searchBox = new google.maps.places.SearchBox(document.getElementById('buscarmapa'));


  google.maps.event.addListener(searchBox,'places_changed',function(){


    var places = searchBox.getPlaces();
    var bounds = new google.maps.LatLngBounds();
    var i, place;

    for(i=0; place=places[i];i++){
        bounds.extend(place.geometry.location);
        marker.setPosition(place.geometry.location); //set marker position new...
      }

      map.fitBounds(bounds);
      map.setZoom(15);

  });

  google.maps.event.addListener(marker,'position_changed',function(){

    var lat = marker.getPosition().lat();
    var lng = marker.getPosition().lng();

    $('#lat').val(lat);
    $('#lng').val(lng);


  });

}

</script>

@endsection

