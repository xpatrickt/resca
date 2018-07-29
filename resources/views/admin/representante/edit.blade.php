@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
active treeview
@endsection
@section('actent')
active
@endsection
@section('actmenu4')
treeview
@endsection

@section ('contenido')
<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-tittle">Asignar Representante Legal a la entidad: </h3>
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
                {!! Form::model($entidad, ['route' => ['admin.representante.update', $entidad->identidad],'method' => 'PUT']) !!}
                {{Form::token()}}
            
                <div class="form-group">

                  <label for="entidad">Entidad</label>
                  <input type="text" name="entidad" value="{{$entidad->nombreentidad}}" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="persona">Representante</label>
                  <select name="idpersona" class="form-control select2" data-placeholder="Selecione un Evaluador">
                    @foreach ($personas as $per)
                      <option value="{{$per->idpersona}}">{{$per->nombres}} </option>
                    @endforeach
                  </select>
                </div>
                 <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>
                 <div class="form-group">
                  <input type="hidden" name="identidad" value="{{$entidad->identidad}}" class="form-control" placeholder="">
                </div>
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ url('admin/entidad') }}" class="btn btn-danger">Cancelar</a>
              </div>
        {!!Form::close()!!}
            </div>
  </div>
  </div>
</div>
</section>

@endsection