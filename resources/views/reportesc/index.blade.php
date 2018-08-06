@extends('layouts.inicio')
@section('pagina')
<h1>Estado de Evaluación Ambiental</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Estado de Evaluación Ambiental
@stop

@section('contenido')
<div class="data-table-container">
          <table id="tabla" class="table table-bordered table-striped data-table">
         
              <thead>
                <tr>
                  <th>Codigo</th>
                  <th>Actividad</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                 </tr>
                </thead>
                <tbody>
                @foreach ($estudios as $est)
                <tr>
                  <td width="5px">{{$est->idestudio}}</td>
                  <td>{{$est->actividad}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->nombreestudio}}</td>
                  <td>{{ $est->descripcionestudio}}</td>
                  <td>{{ $est->estado}}</td>

                </tr>
               @endforeach
                </tbody>

          </table>


      
  </div>
@endsection