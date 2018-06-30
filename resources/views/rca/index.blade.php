@extends('layouts.inicio')
@section('pagina')
<h1>Registros Administrativos de Certificación Ambiental</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Registros Administrativos de Certificación Ambiental
@stop

@section('contenido')
<div class="data-table-container">

          <table id="tabla" class="table table-bordered table-striped data-table">
              <thead>
                <tr>
                  <th>Estudio</th>
                  <th>Linea Base Componente Físico</th>
                  <th>Linea Base Componente Biológico</th>
                  <th>Linea Base Componente SocioEconómico</th>
                  <th>Mapas</th>

                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>   
                            
                  <td>{{$est->nombreestudio}}</td> 

                   @foreach ($documentoestudios as $dest)
                   @if($dest->idestudio=$est->idestudio and $dest->iddocumento='1')
                 <td>{{$dest->urldocumentoestudio}}</td>                  
                  @endif
                  @endforeach

                   @foreach ($documentoestudios as $dest)
                   @if($dest->idestudio=$est->idestudio and $dest->iddocumento='2')
                 <td>{{$dest->urldocumentoestudio}}</td>  
                  @endif
                  @endforeach


                </tr>
               @endforeach
                </tbody>

         </table>
      
  </div>
  
@endsection