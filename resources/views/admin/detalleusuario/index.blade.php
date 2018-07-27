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
@section('actmenu4')
treeview
@endsection

@section ('contenido')

<div >

<section class="content">
<div class="row">
  <div class="col-md-12">
  <div class="box box-primary">
    <div class="box-header with-border">
    <h3 class="box-tittle">Perfil de Usuario</h3>
    </div>
              <div class="box-body">
                @foreach ($usuarios as $user)
                <div class="form-group">
                  <input type="hidden" name="id" value="{{$user->id}}">
                </div>
                <div class="form-group">
                  <label for="nombre">Nombre de Usuario: {{$user->name}}</label>
                </div>

                <div class="form-group">
                  <label for="email">Email: {{$user->email}}</label>
                </div>

                <div class="form-group">
                  <label for="email">Nombre: {{$user->nombre}}</label>
                </div>

                <div class="form-group">
                  <label for="email">Apellidos: {{$user->apellido}}</label>
                </div>
                @endforeach
                </div>
              <div class="box-footer">
                <a href="{{URL::action('DetalleusuarioController@edit',$user->id)}}"><button class="btn btn-primary"><span>Cambiar Contraseña</span></button></a>

              </div>

            </div>
  </div>
  </div>
</div>
</section>


</div>


@endsection