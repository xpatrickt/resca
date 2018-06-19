@section ('contenido')



                <div class="form-group">
                  <label for="departamento">Catologo</label>
                  <select name="departamento" id="departamento" class="form-control input-lg dynamic" data-dependent="provincia">
					<option value="">Seleccione Departamento</option>  
       @foreach($listadepartamentos as $ld)
     <option value="{{ $ld->nombredepartamento}}">{{ $ld->nombredepartamento }}</option>
     @endforeach
                  </select>
                </div>



				  <div class="form-group">
                  <label for="provincia">Catologo</label>
                  <select name="provincia" id="provincia" class="form-control input-lg dynamic" data-dependent="distrito">
					<option value="">Seleccione Provincia</option>                 
                  </select>
                </div>

				  <div class="form-group">
                  <label for="distrito">Catologo</label>
                  <select name="distrito" id="distrito" class="form-control input-lg dynamic">
					<option value="">Seleccione Distrito</option>                 
                  </select>
                </div>
				{{ csrf_field() }}
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