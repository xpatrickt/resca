@extends('layouts.inicio')
@section('pagina')
<h1>Estudios Evaluados</h1>
@endsection

@section('url')
.
@stop
@section('menu')
RESCA
@stop
@section('pagina1')
Estudios Evaluados
@stop

@section('contenido')
<div class="data-table-container">

          <table id="tabla" class="table table-bordered table-striped data-table">
              <thead>
                <tr>
                  <th>Estudio</th>
                  <th>Razón Social</th>
                  <th>RUC</th>
                  <th>Correo</th>
                  <th>Teléfono</th>
                  <th>Dirección</th>

                 </tr>
                </thead>
                <tbody>
                @foreach ($entidades as $ent)
                <tr>
                  <td>{{$ent->nombreactividad}}</td>
                  <td>{{$ent->nombreentidad}}</td>
                  <td>{{$ent->rucentidad}}</td>
                  <td>{{$ent->emailentidad}}</td>
                  <td>{{$ent->telefonoentidad}}</td>
                  <td>{{$ent->direccionentidad}}</td>
                </tr>
               @endforeach
                </tbody>

         </table>
      
  </div>
  
@endsection