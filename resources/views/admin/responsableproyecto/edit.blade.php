@extends('layouts.administrator')
@section('actmenu1')
treeview
@endsection
@section('actmenu2')
treeview
@endsection
@section('treemenu')
treeview
@endsection
@section('actrep')
active
@endsection
@section('actmenu4')
active treeview
@endsection
@section ('contenido')
<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-tittle">Asignar Responsable al Proyecto: </h3>
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
                {!! Form::model($proyecto, ['route' => ['admin.responsableproyecto.update', $proyecto->idproyecto],'method' => 'PUT']) !!}

                {{Form::token()}}
            
                <div class="form-group">

                  <label for="nombre">Nombre</label>
                  <input type="text" name="nombre" value="{{$proyecto->nombreproyecto}}" class="form-control" readonly="readonly">
                </div>
                <div class="form-group">
                  <label for="persona">Evaluador</label>
                  <select name="idpersona" class="form-control select2" data-placeholder="Selecione un Responsable">
                    @foreach ($personas as $per)
                      <option value="{{$per->idpersona}}">{{$per->nombres}} </option>
                    @endforeach
                  </select>
                </div>
                  
                 <div class="form-group">
                  <input type="hidden" name="idproyecto" value="{{$proyecto->idproyecto}}" class="form-control" placeholder="">
                </div>   
               <div class="box-footer">
                <button type="submit" class="btn btn-primary">Registrar</button>
                <a href="{{ url()->previous() }}" class="btn btn-danger">Cancelar</a>
              </div>
        {!!Form::close()!!}
            </div>
  </div>
  </div>
</div>
</section>

@endsection