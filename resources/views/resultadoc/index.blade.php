@extends('layouts.inicio')
@section('pagina')
<h1>Resultados de Certificación Ambiental</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Resultados de Certificación Ambiental
@stop

@section('contenido')
<div class="data-table-container">
          <table id="tabla" class="table table-bordered table-striped data-table">
              
              <thead>
                <tr>
                  <th style="width: 35%">Proyecto</th>
                  <th style="width: 40%">Estudio</th>
                  <th>Fecha</th>
                  <th>Opinión Técnica</th>
                   <th>Certificación</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td>{{$est->proyecto}}</td>
                  <td>{{$est->tiposolicitud}}-{{$est->estudio}}</td>
                  <td>{{ \Carbon\Carbon::parse($est->fecha)->format('d/m/Y')}}</td>
                  
                  <td> 
                  @if(!$est->opiniontecnica)
                  <button class="btn btn-primary" disabled="disabled"><span class="fa fa-download">  Descargar </span></button>
                  @else
                    <a href="../public/admin/{{$est->opiniontecnica}}" target="_blank"><button class="btn btn-primary"><span class="fa fa-download">  Descargar </span></button></a>                  
                  @endif

                  </td>
                  <td> <a href="../public{{$est->resolucion}}" target="_blank"><button class="btn btn-primary"><span class="fa fa-download">  Descargar </span></button></a></td> 
                </tr>
               @endforeach
                </tbody>
         </table>
      
  </div>
  
@endsection