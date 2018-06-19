$(function() {
$('#select-departamento').on('change',onSelectDepartamentoChange);
});

function onSelectDepartamentoChange(){
 var iddepartamento=$(this).val();
alert("entro js"+iddepartamento);
/*if(!iddepartamento){
	$('#select-provincia').html('<option value="">Seleccione</option>');
}*/

/*$.post('/admin/proyecto/create/dep/'+iddepartamento , function(data){
	for(var i=0; i < data.length; i++){ 
		html_select+='<option value="'+data[i].iddepartamento+'">'+data[i].nombredepartamento+'</option>';
		$('#select-provincia').html(html_select);

 }
 
}  
 );*/

 var deletePostUri = "{{ route('delete_post',$post_id)}}";

						    
  
    // Mostramos los valores del array
 
   /*   $prov=DB::table('provincia')->where('condicion','=','1')->where('iddepartamento','=',iddepartamento)->get();

    for(var i=0; i < prov.length; i++){ 
document.getElementById("select-provincia").innerHTML += "<option value='"+"{{$prov->idprovincia}}"+"'>"+"{{$prov->nombreprovincia}}"+"</option>";
   }*/

}

