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
@section('actpro')
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
		<h3 class="box-tittle">Nuevo Proyecto</h3>
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
 

                 {{ Form::open(['route' => 'admin.proyecto.store']) }}
              	{{Form::token()}}
                
                  <div class="form-group">
                  <label for="">Nombre</label>
                  <input type="text" name="nombre" class="form-control" placeholder="Ingrese Nombre">
                </div>
                <div class="form-group">
                  <label for="descripcion">Descripción</label>
                  <input type="text" name="descripcion" class="form-control" placeholder="Ingrese Descripción">
                </div>
                <div class="form-group">
                  <label for="objetivo">Objetivo del Proyecto</label>
                  <input type="text" name="objetivo" class="form-control" placeholder="Ingrese Objetivo">
                </div>
                <div class="form-group">
                  <label for="beneficiarios">Beneficiarios</label>
                  <input type="text" name="beneficiarios" class="form-control" placeholder="Ingrese Beneficiarios">
                </div> 
               

        {{ csrf_field() }}

                <div class="form-group">
                  <label for="entidad">Entidad</label>
                  <select name="identidad" class="form-control">
                    @foreach ($entidades as $ent)
                      <option value="{{$ent->identidad}}">{{$ent->nombreentidad}} </option>
                    @endforeach
                  </select>
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


@section('script')
<script>


$(document).ready(function(){

 $('.dynamic').change(function(){
  if($(this).val() != '')
  {
   var select = $(this).attr("id");
   var value = $(this).val();
   var dependent = $(this).data('dependent');

   var _token = $('input[name="_token"]').val();


   $.ajax({
    url:"{{ route('admin.proyecto.listar') }}",
    method:"POST",
    data:{select:select, value:value, _token:_token, dependent:dependent},
    success:function(result)
    {
     
     $('#'+dependent).html(result);
    }
   })
  }
   else{
    var depen = $(this).data('dependent');
    
    if(depen=='provincia'){
    document.getElementById('provincia').length=0;
    document.getElementById('distrito').length=0;
     }
     if(depen=='distrito'){
      document.getElementById('distrito').length=0;
     }
    
   }
 });

 $('#departamento').change(function(){
  $('#provincia').val('');
  $('#distrito').val('');
 });

 $('#provincia').change(function(){
  $('#distrito').val('');
 });
 

});
</script>

@endsection