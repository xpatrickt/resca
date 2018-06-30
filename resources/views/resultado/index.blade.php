@extends('layouts.inicio')
@section('pagina')
<h1>Resultados de Evaluacion Ambiental</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Resultados de Evaluacion Ambiental
@stop

@section('contenido')
<div class="data-table-container">
          <table id="tabla" class="table table-bordered table-striped data-table">
              
              <thead>
                <tr>
                  <th style="width: 80%">Nombre del Estudio</th>
                  <th>Resolución</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td>{{$est->estudio}}</td>
                  <td> <a href="../public{{$est->resolucion}}"><button class="btn btn-primary"><span class="fa fa-download">Descargar</span></button></a></td> 
                </tr>
               @endforeach
                </tbody>
         </table>
      
  </div>
  
@endsection