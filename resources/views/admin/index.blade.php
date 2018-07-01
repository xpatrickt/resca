@extends('layouts.administrator')

@section('treemenu')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('actmenu4')
treeview
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
                  <td width="1px">{{$est->actividad}}</td>
                  <td>{{ $est->entidad}}</td>
                  <td>{{ $est->proyecto}}</td>
                  <td>{{ $est->nombreestudio}}</td>
                  <td>{{ $est->descripcionestudio}}</td>
                  <td>{{ $est->estado}}</td>

                </tr>
               @endforeach
                </tbody>
             <tfoot>
                <tr>
                  <th>Actividad</th>
                  <th>Entidad</th>
                  <th>Proyecto</th>
                  <th>Estudio</th>
                  <th>Descripción</th>
                  <th>Estado</th>
                </tr>
                </tfoot>
          </table>
  </div>

  
 
    </div>

  </div>
</div>

</section>


@endsection