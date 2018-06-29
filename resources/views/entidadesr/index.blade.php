@extends('layouts.inicio')
@section('pagina')
<h1>Entidades Registradas para Certificación Ambiental</h1>
@endsection

@section('contenido')

<section class="content">
  <div class="row">
  <div class="col-xs-12">
   <div class="box">
    <div class="box-header">
      <h3 class="box-title">Registros Ambientales &nbsp &nbsp &nbsp</h3>
      </div>
    <div class="box-body">

          <table id="tabla" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Actividad</th>

                 </tr>
                </thead>
                <tbody>
                @foreach ($actividades as $act)
                <tr>
                  <td>{{$act->nombreactividad}}</td>
                </tr>
               @endforeach
                </tbody>

          </table>
  </div>

  
 
    </div>

  </div>
</div>

</section>


@endsection