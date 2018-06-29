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

<style>
  #mapacanvas{
    width: 450px;
    height: 320px;
  }
</style>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCyB6K1CFUQ1RwVJ-nyXxd6W0rfiIBe12Q&libraries=places"
  type="text/javascript"></script>

<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box">
   <div class="box-header">
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
          {{ Form::open(['route' =>'admin.registro.edit']) }}
            {{Form::token()}}
            <input type="hidden" id="idestudio1" name="idestudio1" class="form-control" value="{{$estudio->idestudio}}">
               <div class="col-md-5">
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" id="descripcion" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>
               <div class="form-group">
                  <label for="departamento">Departamento</label>
                  <select name="departamento" id="departamento" class="form-control dynamic" 
                  data-dependent="provincia">
                   <option value="">Seleccione Departamento</option>  
                   @foreach($departamentos as $dep)
                       @if($dep->iddepartamento=='030000')
                   <option value="{{$dep->iddepartamento}}" selected>{{ $dep->nombredepartamento }}</option>
                       @else
                   <option value="{{ $dep->iddepartamento}}">{{ $dep->nombredepartamento }}</option>
               @endif
               @endforeach
                  </select>
                </div>
          <div class="form-group">
                  <label for="provincia" disabled>Provincia</label>
                  <select name="provincia" id="provincia" class="form-control dynamic" data-dependent="distrito"> 
                    <option value="">Seleccione Provincia</option>  
                        @foreach($provincias as $pro)
                       <option value="{{ $pro->idprovincia}}">{{ $pro->nombreprovincia }}</option>
                       @endforeach
               </select>
                </div>
               <div class="form-group">
                  <label for="distrito">Distrito</label>
                  <select name="distrito" id="distrito" class="form-control dynamic">
               </select>
              </div>
               <div class="form-group">
                <label for="">Buscar</label>
                  <input type="text" name="buscarmapa" id="buscarmapa" class="form-control">
                  <div class="table-responsive mailbox-messages">
                  <div id="mapacanvas" ></div>
                </div>
                </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="coordenadax">Coordenada x</label>
                  <input type="text" name="lat" id="lat" class="form-control" placeholder="Ingrese Coordenada x">
                </div>
               </div>
                <div class="col-md-6">
                <div class="form-group">
                  <label for="coordenaday">Coordenada y</label>
                  <input type="text" name="lng" id="lng" class="form-control" placeholder="Ingrese Coordenada y">
                </div>  
                </div> 
             {{ csrf_field() }}
              <button type="submit" class="btn btn-primary">Registrar</button>
              </div>
             {!!Form::close()!!}
               <div class="col-md-7">
                 <div class="table-responsive mailbox-messages">
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
          </div>
      <!-- FIN TAB DELIMITACION-->
      <!--TAB DOCUMENTO*******************************************************-->
          <div class="tab-pane" id="documentos">
            <div class="box-body no-padding">
              

             {!!Form::model($estudio,['route'=>['admin.registro.update',$estudio->idestudio],'method' =>'PUT','files'=>'true'])!!} 
              
             {{Form::token()}}
             <input type="hidden" id="idestudio2" name="idestudio2" class="form-control" value="{{$estudio->idestudio}}">
             <div class="col-md-5">
                <div class="form-group">
                  <label for="descripciondocumento">Descripción</label>
                  <input type="text" id="descripciondocumento" name="descripciondocumento" class="form-control" placeholder="Ingrese Descripción">
                </div>
                 <div class="form-group">
                  <label for="tipodocumento">Tipo Documento</label>
                  <select name="tipodocumento" id="tipodocumento" class="form-control dynamic">
                    <option value="">Seleccione Tipo</option>  
                    @foreach($tipodocumento as $doc)
                     <option value="{{ $doc->iddocumento}}">{{ $doc->nombredocumento}}</option>
                     @endforeach
                  </select>
                </div>
                <div class="form-group">
                  <label for="url">Subir Documento</label>
                  <input type="file" name="url" id="url" class="form-control" placeholder="Seleccione Documento">
                </div>
                <button type="submit" class="btn btn-primary">Registrar</button>
             </div>
             {!!Form::close()!!}
            <div class="col-md-7">
            <div class="table-responsive mailbox-messages">
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

  // LISTAR DEPARTAMENTO PROVINCIA Y DISTRITO ----------------------
   $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');

   var _token = $('input[name="_token"]').val();


  if(select=='distrito'){
    var combo = document.getElementById("distrito");
    var selected = combo.options[combo.selectedIndex].text;
    $('#buscarmapa').val(selected);
  }


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

 // CARGAR MAPA CANVAS ---------------------------
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
});
</script>

@endsection