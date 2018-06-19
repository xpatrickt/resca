<?php

namespace resca\Http\Controllers;

use Illuminate\Http\Request;
use resca\Entidad;
use Illuminate\Support\Facades\Redirect;
use resca\Http\Requests\EntidadFormRequest;
use DB;

class EntidadController extends Controller
{
        public function __construct(){

    }
    public function index(Request $request){
    	if($request){
    		$query=trim($request->get('searchText'));
    		$entidades=DB::table('entidad as e')
        ->join('actividad as a','e.idactividad','=','a.idactividad')
        ->select('e.identidad','e.nombreentidad','e.direccionentidad','e.telefonoentidad','e.emailentidad','e.rucentidad','a.nombreactividad as actividad')
        ->where('e.nombreentidad','LIKE','%'.$query.'%')
    		->where('e.condicion','=','1')
    		->orderBy('e.identidad','desc')
    		->paginate(100);
    		return view('admin.entidad.index',["entidades"=>$entidades,"searchText"=>$query]);
        }
    }

    public function create(){
      $actividades=DB::table('actividad')->where('condicion','=','1')->get();
    	return view("admin.entidad.create",["actividades"=>$actividades]);
    }
    public function store(EntidadFormRequest $request){
    	$entidad=new Entidad;
        $entidad->nombreentidad=$request->get('nombre');
       	$entidad->direccionentidad=$request->get('direccion');
       	$entidad->telefonoentidad=$request->get('telefono');
       	$entidad->emailentidad=$request->get('email');
       	$entidad->rucentidad=$request->get('ruc');
        $entidad->idactividad=$request->get('idactividad');
    	$entidad->condicion='1';
   		$entidad->save();
   		return Redirect::to('admin/entidad');
    }

    public function show($identidad){
    	return view("admin.entidad.show",["entidad"=>Entidad::findOrFail($identidad)]);
    }
    public function edit($identidad){
      $entidad=Entidad::findOrFail($identidad);
      $actividades=DB::table('actividad')->where('condicion','=','1')->get();
      return view("admin.entidad.edit",["entidad"=>$entidad,"actividades"=>$actividades]);
    }
    public function update(EntidadFormRequest $request,$identidad){
    	$entidad=entidad::findOrFail($identidad);
        $entidad->nombreentidad=$request->get('nombre');
       	$entidad->direccionentidad=$request->get('direccion');
       	$entidad->telefonoentidad=$request->get('telefono');
       	$entidad->emailentidad=$request->get('email');
       	$entidad->rucentidad=$request->get('ruc');
        $entidad->idactividad=$request->get('idactividad');        
    	$entidad->update();
    	return Redirect::to('admin/entidad');    	
    }
    public function destroy($identidad){
    	$entidad=entidad::findOrFail($identidad);
    	$entidad->condicion='0';
    	$entidad->update();
    	return Redirect::to('admin/entidad');
    }
}
