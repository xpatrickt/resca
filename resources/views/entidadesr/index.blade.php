@extends('layouts.inicio')
@section('pagina')
<h1>Entidades Registradas para Certificación Ambiental</h1>
@endsection
@section('contenido')


          <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Actividad</th>
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


  





@endsection