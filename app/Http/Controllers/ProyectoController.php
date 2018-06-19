<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Proyecto;
use resca\Departamento;
use resca\Provincia;
use resca\Distrito;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\ProyectoFormRequest;
use DB;

class ProyectoController extends Controller
{
    public function __construct(){

    }
    public function index(Request $request){

      if($request){
            $query=trim($request->get('searchText'));
            $proyectos=DB::table('proyecto as p')
            ->join('entidad as e','p.identidad','=','e.identidad')
            ->select('p.idproyecto','p.nombreproyecto','p.descripcionproyecto','p.objetivoproyecto','p.beneficiariosproyecto',
                'e.nombreentidad as entidad')
            ->where('p.nombreproyecto','LIKE','%'.$query.'%')
            ->where('p.condicion','=','1')
            ->orderBy('p.idproyecto','desc')
            ->paginate(999999);
            return view('admin.proyecto.index',["proyectos"=>$proyectos,"searchText"=>$query]);
        }
    }


    public function create(){
        
    
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();

        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        return view("admin.proyecto.create",["departamentos"=>$departamentos,"entidades"=>$entidades]);
    }



    function listar(Request $request)
    {
     
     $select = $request->get('select'); // departamento
     $value = $request->get('value');  //valor
     $dependent = $request->get('dependent'); //provincia
     $id='id'.$select;
     $iddependent='id'.$dependent;
     $nombre='nombre'.$dependent;

     $data = DB::table($select)
     ->join($dependent, $dependent.'.'.$id,'=',$select.'.'.$id)
     ->select($dependent.'.'.$iddependent, $dependent.'.'.$nombre)
       ->where($dependent.'.'.$id, $value)
       ->get();
     $output = '<option value="">Seleccione '.ucfirst($dependent).'</option>';
     foreach($data as $row)
     {
      $output .= '<option value="'.$row->$iddependent.'">'.$row->$nombre.'</option>';
     }
     echo $output;
    }

    
    public function store(ProyectoFormRequest $request){
    	$proyecto=new Proyecto;
    	$proyecto->nombreproyecto=$request->get('nombre');
    	$proyecto->descripcionproyecto=$request->get('descripcion');
        $proyecto->objetivoproyecto=$request->get('objetivo');
    	$proyecto->beneficiariosproyecto=$request->get('beneficiarios');
    	$proyecto->condicion='1';
        $proyecto->identidad=$request->get('identidad');
   		$proyecto->save();
        
   		return Redirect::to('admin/registro/create');
       // return  redirect()->back();
    }

    public function show($idproyecto){
    	return view("admin.proyecto.show",["proyecto"=>Proyecto::findOrFail($idproyecto)]);
    }
    public function edit($idproyecto){
            $proyecto=Proyecto::findOrFail($idproyecto);
        $distritos=DB::table('distrito')->where('condicion','=','1')->get();
        $provincias=DB::table('provincia')->where('condicion','=','1')->get();
        $departamentos=DB::table('departamento')->where('condicion','=','1')->get();
        $entidades=DB::table('entidad')->where('condicion','=','1')->get();
        return view("admin.proyecto.edit",["proyecto"=>$proyecto,"distritos"=>$distritos ,"provincias"=>$provincias,"departamentos"=>$departamentos,"entidades"=>$entidades]);
    }
    public function update(ProyectoFormRequest $request,$idproyecto){
    	$proyecto=Proyecto::findOrFail($idproyecto);
    	$proyecto->nombreproyecto=$request->get('nombre');
        $proyecto->descripcionproyecto=$request->get('descripcion');
        $proyecto->ubicacionproyecto=$request->get('ubicacion');
        $proyecto->codigosiaf=$request->get('codigosiaf');
        $proyecto->condicion='1';
        $proyecto->idcatalogo=$request->get('idcatalogo');
        $proyecto->iddistrito=$request->get('iddistrito');
        $proyecto->identidad=$request->get('identidad');
    	$proyecto->update();
    	return Redirect::to('admin/proyecto');    	
    }
    public function destroy($idproyecto){
    	$proyecto=Proyecto::findOrFail($idproyecto);
    	$proyecto->condicion='0';
    	$proyecto->update();
    	return Redirect::to('admin/proyecto');
    }



}
